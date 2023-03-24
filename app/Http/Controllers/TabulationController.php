<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Exstudent;
use App\Models\Color;
use App\Models\Calculation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Collection;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class TabulationController extends Controller
{

     public function tabulationindex() {
        $school=schoolsession();
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
        $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
         //$subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
  return view('school.tabulationindex',['school'=>$school,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
     }


      public function tabulation(Request $request) {
           
          $school=School::where('eiin',Session::get('school')->eiin)->first();
          $exam=$request->input('exam');
          $year=$request->input('year');
          $babu=$request->input('babu');
          $class=$request->input('class');
          $section=$request->input('section');
          $fromroll=$request->input('fromroll');
          $toroll=$request->input('toroll');

          $color = Color::where('eiin',$school->eiin)->first();

          if($request->check_status=='on'){
            if($toroll>$fromroll){
                 $student = DB::table('marks')
                 ->leftjoin('students', 'students.id', '=', 'marks.uid')
                 ->where('marks.babu',$babu)->where('marks.class',$class)->where('marks.section',$section)
                 ->where('marks.exam',$exam)->where('marks.year',$year)->where('marks.eiin',$school->eiin)
                 ->whereBetween('students.roll',[$fromroll,$toroll])
                 ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
                 ,'students.image' ,'students.addi','marks.*')
                ->orderBy('students.roll','asc')->get();
              }else{
              return back()->with('fail','Invalide Range');  
              }
       }else{
           $student = DB::table('marks')
            ->leftjoin('students', 'students.id', '=', 'marks.uid')
            ->where('marks.babu',$babu)->where('marks.class',$class)->where('marks.section',$section)
            ->where('marks.exam',$exam)->where('marks.year',$year)->where('marks.eiin',$school->eiin)
            ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
            ,'students.image' ,'students.addi','marks.*')
            ->orderBy('students.roll','asc')->get();
       }
     


        $file='Tabulation-'.$class.'-'.$babu.'-'.$school->section.'.pdf';
        
        $data = [ 
          'title' => 'Welcome to OnlineWebTutorBlog.com',
          'student' => $student,
          'class' => $class,
          'exam' => $exam,
          'year' => $year,
          'babu' => $babu,
          'color' => $color,
          'section' => $section,
         ];
          
         $pdf=PDF::setPaper('a4','landscape')->loadView('pdf.tabScience',$data);
         //return $pdf->download($file);
          return  $pdf->stream($file,array('Attachment'=>false)); 

        // return view('pdf.seatplan',['student'=>$student]);
     }



     public function marksheetindex() {
      $school=schoolsession();
      $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
      $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
      $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
      $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
  
  return view('school.marksheetindex',['school'=>$school,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
   }


  public function marksheet(Request $request) {
            $school=School::where('eiin',Session::get('school')->eiin)->first();
            $exam=$request->input('exam');
            $year=$request->input('year');
            $babu=$request->input('babu');
            $class=$request->input('class');
            $section=$request->input('section');
            $fromroll=$request->input('fromroll');
            $toroll=$request->input('toroll');

            $color = Color::where('eiin',$school->eiin)->first();

     
      if($request->check_status=='on'){
            if($toroll>$fromroll){
                 $student = DB::table('marks')
                 ->leftjoin('students', 'students.id', '=', 'marks.uid')
                 ->where('marks.babu',$babu)->where('marks.class',$class)->where('marks.section',$section)
                 ->where('marks.exam',$exam)->where('marks.year',$year)->where('marks.eiin',$school->eiin)
                 ->whereBetween('students.roll',[$fromroll,$toroll])
                 ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
                 ,'students.image' ,'students.addi','marks.*')
                ->orderBy('students.roll','asc')->get();
              }else{
              return back()->with('fail','Invalide Range');  
              }
      }else{
           $student = DB::table('marks')
            ->leftjoin('students', 'students.id', '=', 'marks.uid')
            ->where('marks.babu',$babu)->where('marks.class',$class)->where('marks.section',$section)
            ->where('marks.exam',$exam)->where('marks.year',$year)->where('marks.eiin',$school->eiin)
            ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
            ,'students.image' ,'students.addi','marks.*')
            ->orderBy('students.roll','asc')->get();
      }
    
    $file='Marksheet-'.$class.'-'.$babu.'-'.$school->section.'.pdf';

    $data=[ 
       'title' => 'Welcome to OnlineWebTutorBlog.com',
       'student' => $student,
       'class' => $class,
       'exam' => $exam,
       'year' => $year,
       'babu' => $babu,
       'section' => $section,
       'color' => $color,
       'school' => $school,
      ];
      
     $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.markScience',$data);
     //return $pdf->download($file);
      return  $pdf->stream($file,array('Attachment'=>false)); 

    // return view('pdf.seatplan',['student'=>$student]);
  }


   public function summaryindex() {
        $school=schoolsession();
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
        $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
        return view('school.summaryindex',['school'=>$school,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
   }


 public function summary(Request $request) {
           
    $school=schoolsession();
    $exam=$request->input('exam');
    $year=$request->input('year');
    $babu=$request->input('babu');
    $class=$request->input('class');
    $section=$request->input('section');
    $mainsubject=Calculation::where('babu',$babu)->where('class',$class)->where('eiin',$school->eiin)->first();
    $subcode1=$mainsubject->subcode;  
    $tags=explode(',',$subcode1);


   

  if(!empty($babu) && !empty($section) ){

      $total_pass=DB::table('marks')->where('babu',$babu)->where('class',$class)->where('section',$section)
      ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)->where('result','Passed')->count();

      

      $sum=DB::table('marks')->where('babu',$babu)->where('class',$class)->where('section',$section)
        ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)
        ->select(DB::raw("SUM(sub11) as sub11 ") ,DB::raw("SUM(sub12) as sub12") ,DB::raw("SUM(sub13) as sub13")
        ,DB::raw("SUM(sub14) as sub14"),DB::raw("SUM(sub15) as sub15"),DB::raw("SUM(sub16) as sub16")
        ,DB::raw("SUM(sub17) as sub17"),DB::raw("SUM(sub18) as sub18"),DB::raw("SUM(sub19) as sub19")
        ,DB::raw("SUM(sub20) as sub20"),DB::raw("SUM(sub21) as sub21"),DB::raw("SUM(sub22) as sub22")
        ,DB::raw("SUM(sub23) as sub23"),DB::raw("SUM(sub24) as sub24"),DB::raw("Count(id) as total_stu")
        ,DB::raw("Max(rs) as ranks"))->first();

        if($sum->ranks>1){
          $student=DB::select("select * ,rank() over(order by cgp desc , total desc , id) AS position  from  
          marks where babu='$babu' AND class='$class' AND section='$section'
          AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
        }else{
          $student=DB::select("select * ,rank() over(order by gpa desc , total desc , id) AS position  from  
          marks where babu='$babu' AND class='$class' AND section='$section'
          AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
        }
        
        
       // return $student;

     }else if(!empty($babu)){
       
       $total_pass=DB::table('marks')->where('babu',$babu)->where('class',$class)
        ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)->where('result','Passed')->count();

         $sum=DB::table('marks')->where('babu',$babu)->where('class',$class)
        ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)
        ->select(DB::raw("SUM(sub11) as sub11 ") ,DB::raw("SUM(sub12) as sub12") ,DB::raw("SUM(sub13) as sub13")
        ,DB::raw("SUM(sub14) as sub14"),DB::raw("SUM(sub15) as sub15"),DB::raw("SUM(sub16) as sub16")
        ,DB::raw("SUM(sub17) as sub17"),DB::raw("SUM(sub18) as sub18"),DB::raw("SUM(sub19) as sub19")
        ,DB::raw("SUM(sub20) as sub20"),DB::raw("SUM(sub21) as sub21"),DB::raw("SUM(sub22) as sub22")
        ,DB::raw("SUM(sub23) as sub23"),DB::raw("SUM(sub24) as sub24"),DB::raw("Count(id) as total_stu")
        ,DB::raw("Max(rs) as ranks"))->first();


     if($sum->ranks>1){
        $student=DB::select("select * ,rank() over(order by cgp desc, total desc, id) AS position  from  
        marks where babu='$babu' AND class='$class' 
        AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
     }else{
        $student=DB::select("select * ,rank() over(order by gpa desc, total desc, id) AS position  from  
         marks where babu='$babu' AND class='$class' 
        AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
      }
       // return $student;

       }else if(!empty($section)){

        $total_pass=DB::table('marks')->where('class',$class)->where('section',$section)
        ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)->where('result','Passed')->count();
  
        $sum=DB::table('marks')->where('class',$class)->where('section',$section)
          ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)
          ->select(DB::raw("SUM(sub11) as sub11 ") ,DB::raw("SUM(sub12) as sub12") ,DB::raw("SUM(sub13) as sub13")
          ,DB::raw("SUM(sub14) as sub14"),DB::raw("SUM(sub15) as sub15"),DB::raw("SUM(sub16) as sub16")
          ,DB::raw("SUM(sub17) as sub17"),DB::raw("SUM(sub18) as sub18"),DB::raw("SUM(sub19) as sub19")
          ,DB::raw("SUM(sub20) as sub20"),DB::raw("SUM(sub21) as sub21"),DB::raw("SUM(sub22) as sub22")
          ,DB::raw("SUM(sub23) as sub23"),DB::raw("SUM(sub24) as sub24"),DB::raw("Count(id) as total_stu")
          ,DB::raw("Max(rs) as ranks"))->first();
  
           if($sum->ranks>1){
             $student=DB::select("select * ,rank() over(order by cgp desc , total desc , id )  AS position  from  
             marks where  class='$class' AND section='$section'
             AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
           }else{
             $student=DB::select("select * ,rank() over(order by gpa desc , total desc , id )  AS position  from  
             marks where  class='$class' AND section='$section'
             AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
            }
        // return $student;

       }else{
          $total_pass=DB::table('marks')->where('class',$class)
          ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)->where('result','Passed')->count();
  
         $sum=DB::table('marks')->where('class',$class)
          ->where('exam',$exam)->where('year',$year)->where('eiin',$school->eiin)
          ->select(DB::raw("SUM(sub11) as sub11 ") ,DB::raw("SUM(sub12) as sub12") ,DB::raw("SUM(sub13) as sub13")
          ,DB::raw("SUM(sub14) as sub14"),DB::raw("SUM(sub15) as sub15"),DB::raw("SUM(sub16) as sub16")
          ,DB::raw("SUM(sub17) as sub17"),DB::raw("SUM(sub18) as sub18"),DB::raw("SUM(sub19) as sub19")
          ,DB::raw("SUM(sub20) as sub20"),DB::raw("SUM(sub21) as sub21"),DB::raw("SUM(sub22) as sub22")
          ,DB::raw("SUM(sub23) as sub23"),DB::raw("SUM(sub24) as sub24"),DB::raw("Count(id) as total_stu")
          ,DB::raw("Max(rs) as ranks"))->first();
  
         if($sum->ranks>1){  
             $student=DB::select("select * ,rank() over(order by cgp desc , total asc , id) AS position  from  
             marks where  class='$class' 
             AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
          }else{
             $student=DB::select("select * ,rank() over(order by gpa desc , total asc , id) AS position  from  
             marks where  class='$class' 
              AND exam='$exam' AND year='$year' AND eiin='$school->eiin'");
          }
         //return $student;
       }

       //  return $sum;
       //  die();

    $color = Color::where('eiin',$school->eiin)->first();

  $file='Summary-'.$class.'-'.$babu.'-'.$section.'.pdf';

     if(empty($student[0])){
             return redirect()->back()->with('danger','Invalid Information.Please setup corrent Infromation'); 
      }else{
           $student1=$student[0];
     $data = [ 
      'title' => 'Welcome to OnlineWebTutorBlog.com',
      'student' => $student,
      'student1' => $student1,
      'class' => $class,
      'exam' => $exam,
      'year' => $year,
      'babu' => $babu,
      'sum' => $sum,
      'color' => $color,
      'section' => $section,
      'total_pass' => $total_pass,
      'tags' => $tags,
    ];
           $pdf=PDF::setPaper('a4','landscape')->loadView('pdf.summary',$data);
            //return $pdf->download($file);
            return  $pdf->stream($file,array('Attachment'=>false)); 
   }
    

 
 }


   public function result(){
     $school=schoolsession();
     $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
     $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
     $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
     $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
     // $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
     return view('school.result',['school'=>$school,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
   }

    public function results($eiin,$exam,$year,$stu_id){
      $school=schoolsession();
      $stu=Student::where('eiin',$school->eiin)->where('stu_id',$stu_id)->first();
      if(empty($stu)){
           $student='';
      }else{
        $student = DB::table('marks')
        ->leftjoin('students', 'students.id', '=', 'marks.uid')
        ->where('marks.uid',$stu->id)
        ->where('marks.exam',$exam)->where('marks.year',$year)->where('marks.eiin',$school->eiin)
        ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
        ,'students.image' ,'students.addi','marks.*')
        ->orderBy('students.roll','asc')->first();
      }
       // return $student;
      //die();
      return view('pdf.results',['student'=>$student,'school'=>$school]);
   }

   public function resulterror($eiin,$exam,$year,$stu_id) {
         return redirect()->back();
     }




   public function testimonialindex() {
      $school=schoolsession();
      $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
      $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
      $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
      $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
      return view('school.testimonialindex',['school'=>$school,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
  }


 public function testimonial(Request $request) {
         
    $school=schoolsession();
    $babu=$request->input('babu');
    $class=$request->input('class');
    $section=$request->input('section');
    $year=$request->input('year');
   

    $exstudent = Exstudent::where('babu',$babu)->where('class',$class)->where('section',$section)
    ->where('year',$year)->where('eiin',$school->eiin)->orderBy('roll','asc')->get();

    $color = Color::where('eiin',$school->eiin)->first();

 
    $file='Testimonial-'.$class.'-'.$babu.'-'.$section.'.pdf';
    $data = [ 
       'title' => 'Welcome to OnlineWebTutorBlog.com',
       'exstudent' => $exstudent,
       'class' => $class,
       'babu' => $babu,
       'section' => $section,
       'color' => $color,
       'school' => $school,
     ];
    
   $pdf=PDF::setPaper('a4', 'landscape')->loadView('pdf.testimonial',$data);
   //return $pdf->download($file);
    return  $pdf->stream($file,array('Attachment'=>false)); 

  // return view('pdf.seatplan',['student'=>$student]);
}







public function testing(){
    
      $school=schoolsession();
      $student=Student::where('babu','Na')->where('class','Six')->where('section','A')
      ->where('exam',$school->exam)->where('year',$school->year)->where('eiin',$school->eiin)->orderBy('roll','asc')->get();
      $x=$student;
      $gparank=Exam::where('babu','gpa')->orderBy('serial','asc')->get();
 
     function gpa($totalmarks,$gparank){
      foreach($totalmarks as $row){
        foreach($gparank as $y){
           if($row->sub15t>=$y->text1 && $row->sub15t<$y->text2){
              echo  $y->text3;
           }
         }
      } 
   }

  gpa($x,$gparank);
  

}


public function test(){

   

  return  view('test');

}

     

}
