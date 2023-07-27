<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Examinfo;
use App\Models\Exam;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class MarkController extends Controller
{
   
    public function marksview($class,$babu)
    {
        $admin=adminsession();
        $examinfo = Examinfo::where('babu',$babu)->where('class',$class)->where('eiin',$admin->eiin)->first();  
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
        $classarr=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
        $section=Exam::where('babu','section')->orderBy('serial','asc')->get();

    
        $student = DB::table('marks')
        ->leftjoin('students', 'students.id', '=', 'marks.uid')
        ->where('marks.babu',$babu)->where('marks.class',$class)->where('marks.section', $admin->admin_section)
        ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$admin->eiin)
        ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
        ->orderBy('students.roll','asc')->get();

    
        return view('admin.markview',['admin'=>$admin,'student'=>$student,'exam'=>$exam,
           'year'=>$year,'classarr'=>$classarr ,'group'=>$group ,'section'=>$section]);
    }

   
    public function marksupdate(Request $request){

          $admin=adminsession();

          $fexam=$request->input('fexam');
          $texam=$request->input('texam');

          $fyear=$request->input('fyear');
          $tyear=$request->input('tyear');

          $fclass=$request->input('fclass');
          $tclass=$request->input('tclass');

          $fbabu=$request->input('fbabu');
          $tbabu=$request->input('tbabu');

          $fsection=$request->input('fsection');
          $tsection=$request->input('tsection');

          $student=Mark::where('section',$fsection)->where('babu',$fbabu)->where('class',$fclass)
          ->where('exam',$fexam)->where('year',$fyear)->where('eiin',$admin->eiin)->get();

          $tstudent=Mark::where('section',$tsection)->where('babu',$tbabu)->where('class',$tclass)
          ->where('exam',$texam)->where('year',$tyear)->where('eiin',$admin->eiin)->orderBy('id','desc')->get();
         
         
        // prx($student);
        // die();
        
       if($student){
        if($tstudent->count()<=0){
         foreach($student as $row){     
                $student= new Mark;
                $student->eiin=$admin->eiin;
                $student->class=$tclass;
                $student->babu=$tbabu;
                $student->section=$tsection;
                $student->exam=$texam;
                $student->year=$tyear;
                $student->uid=$row['uid'];
                $student->fgp=$row['gpa'];
                $student->name=$row['name'];
                $student->roll=$row['roll'];
                $student->sub16sn=$row['sub16sn'];
                $student->sub23sn=$row['sub23sn'];
                $student->sub24sn=$row['sub24sn'];
                $student->sub16n=$row['sub16n'];
                $student->sub23n=$row['sub23n'];
                $student->sub24n=$row['sub24n'];
                $student->save();
              } 

                 return redirect()->back()->with('success','Data Updated Successfull');
            }else{
                return redirect()->back()->with('fail','From Information  exist To information');
            }
               
           }else{
            return redirect()->back()->with('fail','No Data Found From Information ');
           }
       }



       public function marksdelete(Request $request){
       
        $babu=$request->input('babu');
        $class=$request->input('class');
        $section=$request->input('section');
        $eiin=$request->input('eiin');
        $exam=$request->input('exam');
        $year=$request->input('year');
      
            DB::delete(
               "delete from marks where eiin='$eiin' AND exam='$exam'  AND  year='$year' 
                AND babu='$babu' AND class='$class' AND section='$section' "
            );  
        return redirect()->back()->with('success','Data Deleted Successfull');  
   }


   public function marksstudent(Request $request){

         $admin=adminsession();
         $class=$request->input('class');
         $babu=$request->input('babu');
         $section=$request->input('section');

     $examinfo = Examinfo::where('babu',$babu)->where('class',$class)->where('eiin',$admin->eiin)->first();  
     $student=Student::where('section',$section)->where('babu',$babu)->where('class',$class)
      ->where('eiin',$admin->eiin)->get();

     $tstudent=Mark::where('section',$section)->where('babu',$babu)->where('class',$class)
      ->where('exam',$examinfo->exam)->where('year',$examinfo->year)->where('eiin',$admin->eiin)->orderBy('id','desc')->get();
    
       
    if($student){
      if($tstudent->count()<=0){
           foreach($student as $row){     
               $student= new Mark;
               $student->eiin=$admin->eiin;
               $student->class=$class;
               $student->babu=$babu;
               $student->section=$section;
               $student->exam=$examinfo->exam;
               $student->year=$examinfo->year;
               $student->uid=$row['id'];
               $student->name=$row['name'];
               $student->roll=$row['roll'];
               $student->sub16sn=$row['moral'];
               $student->sub23sn=$row['main'];
               $student->sub24sn=$row['addi'];
               $student->sub16n=fullsubname($row['moral']);
               $student->sub23n=fullsubname($row['main']);
               $student->sub24n=fullsubname($row['addi']);
               $student->save();
            } 

             return redirect()->back()->with('success','Data Updated Successfull');
        }else{
            return redirect()->back()->with('fail','From Information  exist To information');
        }
           
       }else{
        return redirect()->back()->with('fail','No Data Found From Information ');
       }
   }

   public function markdelete($id){
    $subject=Mark::find($id);
    $subject->delete();
    return redirect()->back()->with('success','Marks Deleted Successfuly');
 } 
    






 
}
