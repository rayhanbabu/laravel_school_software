<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Exam;
use App\Models\Student;
use App\Models\User;
use DB;
use Hash;
use Mail;
use Session;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    function loginview(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
            'eiin'=>'required',
            'admin_pass'=>'required',
       ]);
       $status=1;
       $admin=School::where('eiin','=',$request->eiin)->first();
       if($admin){
        if($request->admin_pass==$admin->admin_pass){
            if($admin->admin_status==$status){
                 $request->session()->put('admin',$admin);
                 return redirect('/admin/dashboard');
              }else{
                return back()->with('fail','Account Deactive');
              }
          }else{
            return back()->with('fail','Incorrect Password');
        }
     }else{
        return back()->with('fail','Incorrect Username');
     }

}

    function dashboard(){
        if(Session::has('admin')){
           $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
        }
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
       
        return view('admin.dashboard',['admin'=>$admin,'exam'=>$exam,'year'=>$year]); 
    }


    public function logout(){
        if(Session::has('admin')){
            Session::pull('admin');
            return redirect('admin/login');
        }
     }

     public function adminsection($section){
        $admin=School::where('eiin',Session::get('admin')->eiin)->first();
        $eiin=$admin->eiin;
        DB::update(
           "update schools set admin_section ='$section' where eiin='$eiin'"
          );  
          return back()->with('success','Section  change Successful'); 
  }


  
  public function yearupdate(Request $request){
      $school=School::find($request->input('edit_id'));
      $school->exam=$request->input('exam');
      $school->year=$request->input('year');
      $school->update();
    return redirect()->back()->with('success','Exam Update Successfull');
}   

public function stuview() {
    $admin=School::where('eiin',Session::get('admin')->eiin)->first();
    $student = Student::where('section',$admin->admin_section)->where('eiin',$admin->eiin)->get();
    $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
    $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
    $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
    $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
 return view('admin.stuview',['admin'=>$admin,'student'=>$student,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
  }
     
  public function stuupdate(Request $request){

         $admin=School::where('eiin',Session::get('admin')->eiin)->first();

         $fclass=$request->input('fclass');
         $tclass=$request->input('tclass');

         $fbabu=$request->input('fbabu');
         $tbabu=$request->input('tbabu');

         $fsection=$request->input('fsection');
         $tsection=$request->input('tsection');

         $student=Student::where('section',$fsection)->where('babu',$fbabu)->where('class',$fclass)
         ->where('eiin',$admin->eiin)->get();

         $fcodema=$admin->eiin.substr($fclass,0,3).substr($fbabu,0,2).$fsection.rand(1000,9999);

         $tstudent=Student::where('section',$tsection)->where('babu',$tbabu)->where('class',$tclass)
        ->where('eiin',$admin->eiin)->orderBy('id','desc')->get();
        

        
        if($student){
        if($tstudent->count()<=0){
         foreach($student as $row){     
                $student= new Student;
                $student->codema=$fcodema;
                $student->eiin=$admin->eiin;
                $student->class=$tclass;
                $student->babu=$tbabu;
                $student->section=$tsection;
                $student->stu_id=$row['stu_id'];
                $student->roll=$row['roll'];
                $student->name=$row['name'];
                $student->moral=$row['moral'];
                $student->main=$row['main'];
                $student->addi=$row['addi'];
                $student->father=$row['father'];
                $student->mother=$row['mother'];
                $student->address=$row['address'];
                $student->phone=$row['phone'];
                $student->image=$row['image'];
                $student->save();
              } 

              $student=Student::where('section',$fsection)->where('babu',$fbabu)->where('class',$fclass)
              ->where('eiin',$admin->eiin)->delete();

              return redirect()->back()->with('success','Data Updated Successfull');
            }else{
             return redirect()->back()->with('fail','From Information  exist to information');
            }
               
           }else{
            return redirect()->back()->with('fail','No Data Found From Information ');
           }
    
  }

  public function studeleteview() {
    $admin=School::where('eiin',Session::get('admin')->eiin)->first();
    $student = Student::where('section',$admin->admin_section)
     ->where('eiin',$admin->eiin)->get();
    $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
    $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
    $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
    $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
 return view('admin.studelete',['admin'=>$admin,'student'=>$student,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
  }


  public function studelete(Request $request){
       
       $babu=$request->input('babu');
       $class=$request->input('class');
       $section=$request->input('section');
       $eiin=$request->input('eiin');
     
       DB::delete(
             "delete from students where eiin='$eiin' 
             AND babu='$babu' AND class='$class' AND section='$section' "
          );  
       return redirect()->back()->with('success','Data Deleted Successfull');  
  }

  public function studeletema(Request $request){
      $codema=$request->input('codema');
      $eiin=$request->input('eiin');
  
     DB::delete(
     "delete from students where eiin='$eiin' AND codema='$codema' ");  
    return redirect()->back()->with('success','Data Deleted Successfull');  
    }

    function export(){
    if(Session::has('admin')){
       $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
       $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
       $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
       $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
       $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
      }
    
   return view('admin.export',['admin'=>$admin,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]); 
    }

    public function exports(Request $request){
     
        $babu=$request->input('babu');
        $class=$request->input('class');
        $section=$request->input('section');
        $eiin=$request->input('eiin');

       

        $codema=$eiin.substr($class,0,3).substr($babu,0,2).$section;
      
        return (new StudentExport($eiin,$babu,$class,$section))->download($codema.'.csv'); 
        //return redirect()->back()->with('success','Data Deleted Successfull');  
        // return $year;
   }

   function import(){
    if(Session::has('admin')){
       $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
      }
    
       return view('admin.import',['admin'=>$admin,]); 
    }


    public function imports(Request $request){
         Excel::Import(new StudentImport,request()->file('file'));
        return redirect()->back()->with('status', 'Import Successfull');  
      //  return $fileName;
      }
 


}
