<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintain;
use App\Models\Admin;
use DB;
use Hash;
use Mail;
use Session;
use PDF;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class MaintainController extends Controller
{
    function loginview(){
        return view('maintain.login');
    }



    public function login(Request $request){
        $request->validate([
            'maintain_name'=>'required',
            'maintain_password'=>'required',
       ]);

       $maintain=DB::table('maintains')->where('maintain_name','=',$request->maintain_name)->first();
       if($maintain){
        if($request->maintain_password==$maintain->maintain_password){
            $request->session()->put('maintain',$maintain);
            return redirect('/maintain/dashboard');
        }else{
            return back()->with('fail','Incorrect Password');
        }
     }else{
        return back()->with('fail','Incorrect Username');
     }

    }

    function dashboard(){
        if(Session::has('maintain')){
            $maintain=Session::get('maintain');
        }
       return view('maintain.dashboard',['maintain'=>$maintain]); 
      // return $dashboard->name ;
    }


    public function logout(){
        if(Session::has('maintain')){
            Session::pull('maintain');
           return redirect('maintain/login');
        }
    }


    function password(){
        if(Session::has('maintain')){
            $maintain=Session::get('maintain');
       }
       return view('maintain.password',['maintain'=>$maintain]); 
        //return 'rayhan';
    }

    
  
  function passwordedit(Request $request)
    {
        $email=$request->input('email');
        $n_pass=$request->input('n_pass');
        $c_pass=$request->input('c_pass');
        if(Session::has('maintain')){
            $maintain=Session::get('maintain');
         }
         if($email==$maintain->email){
            if($n_pass==$c_pass){

             $password= Maintain::find($maintain->id);
             //$password->password=Hash::make($npass);
              $password->maintain_password=$n_pass;
              $password->update();
              return redirect('/maintain/password')->with('success','Passsword change  successfully');
            }else{
            return back()->with('fail','New Password and Confirm Password does not match');
         }
        }else{
         return back()->with('fail','Invalid E-mail');
    }
         
    }

    public function forget(){
        return view('maintain.forget');
       }


       public function forgetemail(request $request){
   
        $email=$request->input('email');
        $rand=rand(11111,99999);
        $email_exist=Maintain::where('email',$email)->count('email');
       if($email_exist>=1){
           DB::update(
              "update maintains set forget_code ='$rand' where email = '$email'"
            );
            $subject='MAintain Verification Code';  
                $title='Hi ';
                $body='Your one time recovery code';
                $link='';
                $name='ANCOVA';  
                $details = [
                 'subject' => $subject,
                 'title' => $title,
                 'otp_code' => $rand,
                 'link' => $link,
                 'body' => $body,
                 'name' => $name,
                ];
                Mail::to($email)->send(new \App\Mail\MyTestMail($details));


           return response()->json([
              'status'=>500,
              'errors'=> 'Email exist',
           ]); 
        }else{
            return response()->json([
              'status'=>600,
              'errors'=> 'Invalid  Email ',
           ]); 
        }   
  }   



  public function forgetcode(request $request){
        
    $email_id=$request->input('email_id');
    $forget_code=$request->input('forget_code');
    $code_exist=Maintain::where('email',$email_id)->where('forget_code',$forget_code)->count('email');
    if($code_exist>=1){ 
         return response()->json([
            'status'=>500,
            'errors'=> 'valid code',
         ]); 
    }else{
        return response()->json([
          'status'=>600,
          'errors'=> 'Invalid  Code',
       ]); 
    }   
}


public function confirmpass(request $request){
    
    $email_id_pass=$request->input('email_id_pass');
    $npass=$request->input('npass');
    $cpass=$request->input('cpass');
    //$password=Hash::make($npass);
    $password=$npass;
   
     if($npass == $cpass){
       DB::update(
          "update maintains set maintain_password ='$password' where email = '$email_id_pass'"
        );
         return response()->json([
            'status'=>500,
            'errors'=> 'valid code',
         ]); 

    }else{
        return response()->json([
           'status'=>600,
           'errors'=> 'New password & Confirm password Does not match',
       ]); 
    }   
}


public function adminview(){
     $admin=Admin::get();
     return view('maintain.admin',['admin'=>$admin]);
}

public function admininsert(request $request){

    $validated = $request->validate([
        'mobile' => 'required|unique:admins|max:255',
        'email' => 'required|unique:admins|max:255',
        'admin_name' => 'required|unique:admins|max:255',
    ]);

    $admin= new Admin;
    $admin->name=$request->input('name');
    $admin->email=$request->input('email');
    $admin->mobile=$request->input('mobile');
    $admin->admin_name=$request->input('admin_name');
    $admin->admin_password=$request->input('admin_password');
    $admin->role=$request->input('role');
    $admin->save();
   return redirect()->back()->with('success','Admin Added Successfuly');

}


public function adminedit(request $request){


    $validated = $request->validate([
        'mobile' => 'required|max:255',
        'email' => 'required|max:255',
        'admin_name' => 'required|max:255',
    ]);

    $admin= Admin::find($request->input('id'));
    $admin->name=$request->input('name');
    $admin->email=$request->input('email');
    $admin->mobile=$request->input('mobile');
    $admin->admin_name=$request->input('admin_name');
    $admin->admin_password=$request->input('admin_password');
    $admin->role=$request->input('role');
    $admin->update();
    return redirect()->back()->with('success','Admin Update Successfuly');
}

public function admindelete($id){
    $admin=Admin::find($id);
    $admin->delete();
    return redirect()->back()->with('success','Admin Deleted Successfuly');
}

public function adminstatus($status,$id){

    if($status=='deactive'){
        $type=0;
      }else{
       //$type=md5(1);
         $type=1;
      }
      DB::update(
       "update admins set status ='$type' where id = '$id'"
      );  
      return back()->with('success','Status Successful'); 
   }



     public function adminpdf(Request $request){

          $invoice=$request->input('invoice');
          $file='Payment_'.$invoice.'.pdf';
          $admin=Admin::get();

          $data = [
              'title' => 'Welcome to OnlineWebTutorBlog.com',
              'admin' => $admin,
           ];	

           $pdf=PDF::setPaper('a4','portrait')->loadView('maintain/adminpdf',$data);
          //return $pdf->download($file);
           return $pdf->stream($file,array('Attachment'=>false));
      }


    public function adminexportview(){

        return view('maintain.adminexport');
    }
         


    public function adminexport(Request $request){
         $eiin=$request->input('eiin');
         return (new UserExport($eiin))->download($eiin.'.csv');   
      }

     public function adminimportview(){
        return view('maintain.adminimport');
      }

       public function adminimport(Request $request){
           
          //  Excel::Import(new UserImport, request()->file('file'));
           Excel::import(new UsersImport,request()->file('file'));   
            return back();
        } 
    
        
         
    
}
