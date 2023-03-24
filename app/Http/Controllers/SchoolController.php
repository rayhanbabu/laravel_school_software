<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Exam;
use App\Models\Examinfo;
use App\Models\Subject;
use App\Models\Onlinepayment;
use Illuminate\Support\Facades\File;
use DB;
use Hash;
use Mail;
use Session;
use PDF;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends Controller
{
   
     public function schoolview(){
        $school=School::get();
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
        $shift=Exam::where('babu','other1')->orderBy('serial','asc')->get();
        return view('maintain.school',['school'=>$school,'exam'=>$exam,'year'=>$year,'shift'=>$shift]);
     }


     public function schoolinsert(Request $request){

        $validated = $request->validate([
            'eiin' => 'required|unique:schools|max:255',
            'school_phone' => 'required|unique:schools|max:255',
            'email' => 'required|unique:schools|max:255',
        ]);
      
        $create_date=date("Y-m-d");
        $subscribe=$request->input('subscribe');
        $expired_date=date("Y-m-d",strtotime($create_date.$subscribe."month"));  // Server month hobe


         
       
        $size = $request->file('image')->getsize(); 
        $file=$_FILES['image']['tmp_name'];
        $hw=getimagesize($file);
        $w=$hw[0];
        $h=$hw[1];	 
           if($size<512000){
            if($w<310 && $h<310){
             $image= $request->file('image'); 
             $new_name = rand() . '.' . $image->getClientOriginalExtension();
             $destinationPath = public_path().'/uploads/admin' ;
             $image->move($destinationPath,$new_name);


             
             $password=rand(1000000,9999999);
             //$password2=rand(1000000,9999999);
             $school= new School;
             $school->school=$request->input('school');
             $school->eiin=$request->input('eiin');
             $school->year=$request->input('year');
             $school->address=$request->input('address');
             $school->school_phone=$request->input('school_phone');
             $school->email=$request->input('email');
             $school->teacher_phone=$request->input('teacher_phone');
             $school->mnsize=$request->input('mnsize');
             $school->ansize=$request->input('ansize');
             $school->sasize=$request->input('sasize');
             $school->shsize=$request->input('shsize');
             $school->payment=$request->input('payment');
             $school->payment_details=$request->input('payment_details');
             $school->image_access=$request->input('image_access');
             $school->fin_access=$request->input('fin_access');
             $school->sms_access=$request->input('sms_access');
             $school->atten_access=$request->input('atten_access');
             $school->address_details=$request->input('address_details');
             $school->section_des=$request->input('section_des');

             $school->created_date=$create_date;
             $school->expired_date=$expired_date;
             $school->payment_duration=$request->input('payment_duration');
             $school->subscribe=$request->input('subscribe');
        
             $school->aid=$request->input('aid');
             $school->aname=$request->input('aname');
             $school->aphone=$request->input('aphone');
             $school->aemail=$request->input('aemail');
             $school->text1=$request->input('text1');
             $school->text2=$request->input('text2');
             $school->text3=$request->input('text3');
             $school->text4=$request->input('text4');
             $school->image=$new_name;
             $school->status=1;
             $school->admin_status=1;
             $school->admin_pass='rayhanschool';
             $school->admin_section='A';
             $school->school_pass=$password;
             $school->save();

                
             $model= new Onlinepayment;
             $model->eiin=$request->input('eiin');
             $model->des1=$request->input('payment_details');
             $model->amount1=$request->input('payment');
             $model->payment=$request->input('payment');
             $model->subscribe=$request->input('subscribe');
             $model->payment_duration=$request->input('payment_duration');
             $model->created_date=$create_date;
             $model->expired_date=$expired_date;                    
             $model->save();
              

        
             return redirect()->back()->with('success','School Registration Successfull');
          }else{
            return redirect()->back()->with('fail','Image size must be 300*300KB');
            }
         }else{
            return redirect()->back()->with('fail','Image Size greater than 500KB');
         }
       }


       public function schoolviewid($id){
        $school=School::find($id);
        return response()->json([
            'status'=>500,
            'school'=>$school,
         ]);
    }

    public function schoolstatus($type,$status,$id){

        if($status=='deactive'){
            $status1=0;
          }else{
           //$type=md5(1);
             $status1=1;
          }

   if($type=='status'){ 
          DB::update("update schools set status ='$status1' where id = '$id'");  
          return back()->with('success','Status change Successful'); 
      }else if($type=='admin_status'){
        DB::update("update schools set admin_status ='$status1' where id = '$id'");  
           return back()->with('success','Admin Status change Successful'); 
      }
      }


      public function allschoolstatus(Request $request){

             $status=$request->input('status'); 
             $type=$request->input('type'); 

             if($type=='school_status'){
                DB::update(
                    "update schools set status ='$status' "
                   );  
                   return back()->with('success','School All Status change Successful'); 

             }else if($type=='admin_status'){
                DB::update(
                    "update schools set admin_status ='$status' "
                   );  
                   return back()->with('success','Admin All Status change Successful'); 
             }
      }



     public function schoolupdate(Request $request){


      $validated = $request->validate([
         'eiin' => 'required|unique:schools,eiin,'.$request->input('edit_id'),
         'school_phone' => 'required|unique:schools,school_phone,'.$request->input('edit_id'),
         'email' => 'required|unique:schools,email,'.$request->input('edit_id'),
     ]);

         $school=School::find($request->input('edit_id'));
                 $school->school=$request->input('school');
                 $school->eiin=$request->input('eiin');
                 $school->address=$request->input('address');
                 $school->school_phone=$request->input('school_phone');
                 $school->email=$request->input('email');
                 $school->year=$request->input('year');
                 $school->shift=$request->input('shift');
                 $school->exam=$request->input('exam');
                 $school->payment=$request->input('payment');
                 $school->payment_details=$request->input('payment_details');
                 $school->aid=$request->input('aid');
                 $school->aname=$request->input('aname');
                 $school->aphone=$request->input('aphone');
                 $school->aemail=$request->input('aemail');
                 $school->text1=$request->input('text1');
                 $school->text2=$request->input('text2');
                 $school->text3=$request->input('text3');
                 $school->text4=$request->input('text4');
                 $school->school_pass=$request->input('school_pass');
                 $school->admin_pass=$request->input('admin_pass');
                 $school->image_access=$request->input('image_access');
                 $school->fin_access=$request->input('fin_access');
                 $school->sms_access=$request->input('sms_access');
                 $school->atten_access=$request->input('atten_access');
                 $school->address_details=$request->input('address_details');
                 $school->section_des=$request->input('section_des');
                 $school->teacher_phone=$request->input('teacher_phone');
                 $school->mnsize=$request->input('mnsize');
                 $school->ansize=$request->input('ansize');
                 $school->sasize=$request->input('sasize');
                 $school->shsize=$request->input('shsize');
                 $school->bank_name=$request->input('bank_name');
                 $school->bank_account=$request->input('bank_account');
                 $school->inv_part=$request->input('inv_part');
                 $school->sms_access2=$request->input('sms_access2');
                 $school->test1=$request->input('test1');
                 $school->test2=$request->input('test2');
                 $school->test3=$request->input('test3');
                 $school->test4=$request->input('test4');
                 $school->inv_access_day=$request->input('inv_access_day');
                 $school->spend_access=$request->input('spend_access');
                 $school->atten_group_access=$request->input('atten_group_access');
                 $school->atten_section_access=$request->input('atten_section_access');
                 $school->payment_duration=$request->input('payment_duration');
                 $school->subscribe=$request->input('subscribe');
                 $school->created_date=$request->input('created_date');
                 $school->expired_date=$request->input('expired_date');
        


               if($request->hasfile('image')){

                        $size = $request->file('image')->getsize(); 
                        $file=$_FILES['image']['tmp_name'];
                        $hw=getimagesize($file);
                        $w=$hw[0];
                        $h=$hw[1];	 
                           if($size<512000){
                            if($w<310 && $h<310){
                                $path='schoolsoft4/public/uploads/admin/'.$school->image;
                                if(File::exists($path)){
                                 File::delete($path);
                                 }
                                $image = $request->file('image');
                                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                                $destinationPath = public_path().'/uploads/admin' ;
                                $image->move($destinationPath,$new_name);
                                $school->image=$new_name;
                             }else{
                                 return redirect()->back()->with('fail','Image size must be 300*300KB');
                                }
                             }else{
                                 return redirect()->back()->with('fail','Image Size greater than 500KB');
                              }
                    }

                    $school->update();
            
                 return redirect()->back()->with('success','School Update Successfull');
    
       }


       public function schooldelete($id){
        $school=School::find($id);
        $path='uploads/admin/'.$school->image;
        if(File::exists($path)){
           File::delete($path);
        }
        $school->delete();
        return redirect()->back()->with('success','School Deleted Successfuly');
       }



       function loginview(){
         return view('school.schoollogin');
         }


     public function schoollogin(Request $request){
      $request->validate([
          'school_phone'=>'required',
          'school_pass'=>'required',
     ]);
        $status=1;
       $sectionarr=DB::table('exams')->where('babu','section')->get();
       $school=DB::table('schools')->where('school_phone','=',$request->school_phone)->first();
       if($school){
         if($request->school_pass==$school->school_pass){
            if($school->status==$status){
               $request->session()->put('school',$school);
               $request->session()->put('section','A');
               $request->session()->put('sectionarr',$sectionarr);
               return redirect('/dashboard');
           }else{
               return back()->with('fail','Account Deactive');
         }
      }else{
          return back()->with('fail','Incorrect Password');
      }
      }else{
         return back()->with('fail','Incorrect Phone Number');
      }

  }


  function password(){
       $school=schoolsession();
  return view('school.password',['school'=>$school]); 
   //return 'rayhan';
}



function passwordedit(Request $request)
{
   $email=$request->input('email');
   $n_pass=$request->input('n_pass');
   $c_pass=$request->input('c_pass');
    $school=schoolsession();

    if($email==$school->email){
       if($n_pass==$c_pass){
          $password= School::find($school->id);
          //$password->password=Hash::make($npass);
          $password->school_pass=$n_pass;
          $password->update();
          return redirect('/school/password')->with('success','Passsword change  successfully');
       }else{
       return back()->with('fail','New Password and Confirm Password does not match');
    }
   }else{
    return back()->with('fail','Invalid E-mail');
}
    
}


public function forget(){
   return view('school.forget');
  }


  public function forgetemail(request $request){

   $email=$request->input('email');
   $rand=rand(11111,99999);
   $email_exist=School::where('email',$email)->count('email');
  if($email_exist>=1){
      DB::update("update schools set forget_code ='$rand' where email = '$email'");
           $subject='School Forget Verification Code';  
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
          // Mail::to($email)->send(new \App\Mail\MyTestMail($details));


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
$code_exist=School::where('email',$email_id)->where('forget_code',$forget_code)->count('email');
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
     "update schools set school_pass ='$password' where email = '$email_id_pass'"
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



  function dashboard(){
   if(Session::has('school')){
         $school=School::where('eiin',schoolsession()->eiin)->first();
         $examinfo = Examinfo::where('eiin',$school->eiin)->get();
         $total=DB::table('students')->where('section',Session::get('section'))
         ->where('eiin',$school->eiin)->count();
        return view('school.dashboard',['school'=>$school ,'total'=>$total ,'examinfo'=>$examinfo]); 
        
    }else if(Session::has('teacher')){
      $teacher=Teacher::where('eiin',teachersession()->eiin)->first();
      return view('school.dashboard',['teacher'=>$teacher]); 
    }
 
  //return $school->eiin ;
  }


  public function schoollogout(){
   if(Session::has('school')){
       Session::pull('school');
       Session::pull('section');
      return redirect('/schoollogin');
   }
  }
 
   public function schoolsection(Request $request ,$section){
          Session::pull('section');

          if(!Session::has('section')){
               $request->session()->put('section',$section);
               return back()->with('success','Section  change Successful'); 
          }


          
   }


   public function adminpass(Request $request){
      $admin_pass=$request->input('admin_pass');
      DB::update("update schools set admin_pass ='$admin_pass'");  
      return back()->with('success','Admin Password  change Successful'); 
   }
   
}
