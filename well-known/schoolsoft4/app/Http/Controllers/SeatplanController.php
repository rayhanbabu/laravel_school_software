<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Exam;
use App\Models\Examinfo;
use App\Models\Student;
use App\Models\Admit;
use App\Models\Color;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Collection;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class SeatplanController extends Controller
{
    public function seatplanindex() {

      
          $school=schoolsession();
       // $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
          $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
          $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
          return view('school.seatplanindex',['school'=>$school,'class'=>$class,'group'=>$group]);
     }


     public function seatplan(Request $request) {
        $school=schoolsession();
        $class=$request->input('class');
        $babu=$request->input('babu');
        $section=$request->input('section');
        $examinfo=Examinfo::where('babu',$babu)->where('class',$class)->where('eiin',$school->eiin)->first();
  

       if(empty($examinfo)){
              return back()->with('danger','SeatPlan Not Found'); 
       }else{
              $student = Student::where('babu',$babu)->where('class',$class)->where('section',$section)
              ->where('eiin',$school->eiin)->orderBy('roll','asc')->get();

             $color = Color::where('eiin',$school->eiin)->first();
             $file='Seatplan-'.$class.'-'.$babu.'-'.Session::get('section').'.pdf';

       return view('pdf.seatplan',['student'=>$student,'file'=>$file,'examinfo'=>$examinfo,'color'=>$color,'school'=>$school]);
         }
     }



      public function inputformindex() {
          $school=schoolsession();
          $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
          $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
          return view('school.inputformindex',['school'=>$school,'class'=>$class,'group'=>$group]);
       }


   public function inputform(Request $request) {
     $school=schoolsession();
     $class=$request->input('class');
     $babu=$request->input('babu');
     $section=$request->input('section');

     $examinfo = Examinfo::where('babu',$babu)->where('class',$class)->where('eiin',$school->eiin)->first();

    if(empty($examinfo)){
      return back()->with('danger','Input Form Not Found'); 
    }else{
     $student = Student::where('babu',$babu)->where('class',$class)->where('section',$section)
     ->where('eiin',$school->eiin)->orderBy('roll','asc')->get();
    
     $color = Color::where('eiin',$school->eiin)->first();
 
     $file='Inputform-'.$class.'-'.$babu.'-'.$section.'.pdf';

     $data = [
          'title' => 'Welcome to OnlineWebTutorBlog.com',
          'class'=>$class,
          'babu'=>$babu,
          'color'=>$color,
          'section'=>$section,
          'student' => $student,
          'examinfo' => $examinfo,
          'school' => $school,
     ];
      
     $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.inputform',$data);
     //return $pdf->download($file);
      return  $pdf->stream($file,array('Attachment'=>false)); 

     }

    // return view('pdf.seatplan',['student'=>$student]);
   }


   public function admitpdf(){
      $school=schoolsession();
      $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
      $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
      // $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
    return view('school.admitpdf',['school'=>$school,'class'=>$class,'group'=>$group]);
   }


   public function admit(Request $request){
    $school=schoolsession();
    $class=$request->input('class');
    $babu=$request->input('babu');
    $section=$request->input('section');

    $admit = Admit::where('babu',$babu)->where('class',$class)->where('section',$section)->where('eiin',$school->eiin)->first();
    $examinfo = Examinfo::where('babu',$babu)->where('class',$class)->where('eiin',$school->eiin)->first();
   
     if(!$admit){
        return back()->with('danger','Please fillup exam routine at first'); 
     }else{
    
     if($admit->sub1!=0){
       $sub1=Exam::where('babu','subject')->where('serial',$admit->sub1)->first();
       $sub1s=$sub1->text1;
   
      }else{
       $sub1s='';
      }

     if($admit->sub2!=0){
         $sub2=Exam::where('babu','subject')->where('serial',$admit->sub2)->first();
         $sub2s=$sub2->text1;
       }else{
         $sub2s='';
      }

     if($admit->sub3!=0){
      $sub3=Exam::where('babu','subject')->where('serial',$admit->sub3)->first();
      $sub3s=$sub3->text1;
      }else{
       $sub3s='';
     }

     if($admit->sub4!=0){
      $sub4=Exam::where('babu','subject')->where('serial',$admit->sub4)->first();
      $sub4s=$sub4->text1;
      }else{
       $sub4s='';
     }

     if($admit->sub5!=0){
       $sub5=Exam::where('babu','subject')->where('serial',$admit->sub5)->first();
       $sub5s=$sub5->text1;
      }else{
       $sub5s='';
     }

     if($admit->sub6!=0){
      $sub6=Exam::where('babu','subject')->where('serial',$admit->sub6)->first();
      $sub6s=$sub6->text1;
      }else{
       $sub6s='';
     }

     if($admit->sub7!=0){
      $sub7=Exam::where('babu','subject')->where('serial',$admit->sub7)->first();
      $sub7s=$sub7->text1;
      }else{
       $sub7s='';
     }

     if($admit->sub8!=0){
      $sub8=Exam::where('babu','subject')->where('serial',$admit->sub8)->first();
      $sub8s=$sub8->text1;
      }else{
       $sub8s='';
     }

     if($admit->sub9!=0){
      $sub9=Exam::where('babu','subject')->where('serial',$admit->sub9)->first();
      $sub9s=$sub9->text1;
      }else{
       $sub9s='';
     }

     if($admit->sub10!=0){
      $sub10=Exam::where('babu','subject')->where('serial',$admit->sub10)->first();
      $sub10s=$sub10->text1;
      }else{
       $sub10s='';
     }

     if($admit->sub11!=0){
      $sub11=Exam::where('babu','subject')->where('serial',$admit->sub11)->first();
       $sub11s=$sub11->text1;
      }else{
       $sub11s='';
     }

     if($admit->sub12!=0){
       $sub12=Exam::where('babu','subject')->where('serial',$admit->sub12)->first();
       $sub12s=$sub12->text1;
      }else{
       $sub12s='';
     }

     if($admit->sub13!=0){
      $sub13=Exam::where('babu','subject')->where('serial',$admit->sub13)->first();
      $sub13s=$sub13->text1;
      }else{
       $sub13s='';
     }

     if($admit->sub14!=0){
        $sub14=Exam::where('babu','subject')->where('serial',$admit->sub14)->first();
        $sub14s=$sub14->text1;
      }else{
       $sub14s='';
     }

     if($admit->sub15!=0){
        $sub15=Exam::where('babu','subject')->where('serial',$admit->sub15)->first();
        $sub15s=$sub15->text1;
      }else{
       $sub15s='';
     }

     if($admit->sub16!=0){
       $sub16=Exam::where('babu','subject')->where('serial',$admit->sub16)->first();
       $sub16s=$sub16->text1;
      }else{
       $sub16s='';
     }

     if($admit->sub17!=0){
      $sub17=Exam::where('babu','subject')->where('serial',$admit->sub17)->first();
      $sub17s=$sub17->text1;
    }else{
     $sub17s='';
   }

   if($admit->sub18!=0){
     $sub18=Exam::where('babu','subject')->where('serial',$admit->sub18)->first();
     $sub18s=$sub18->text1;
    }else{
     $sub18s='';
   }
   
        



    $student = Student::where('babu',$babu)->where('class',$class)->where('section',Session::get('section'))
    ->where('eiin',$school->eiin)->orderBy('roll','asc')->get();

    $color = Color::where('eiin',$school->eiin)->first();

    $file='Admit-'.$class.'-'.$babu.'-'.$section.'.pdf';

   $data = [
      'title' => 'Welcome to OnlineWebTutorBlog.com',
      'class'=>$class,
      'file'=>$file,
      'babu'=>$babu,
      'section'=>$section,
      'student' => $student,
      'color' => $color,
      'admit' => $admit,
      'sub1s' => $sub1s,
      'sub2s' => $sub2s,
      'sub3s' => $sub3s,
      'sub4s' => $sub4s,
      'sub5s' => $sub5s,
      'sub6s' => $sub6s,
      'sub7s' => $sub7s,
      'sub8s' => $sub8s,
      'sub9s' => $sub9s,
      'sub10s' => $sub10s,
      'sub11s' => $sub11s,
      'sub12s' => $sub12s,
      'sub13s' => $sub13s,
      'sub14s' => $sub14s,
      'sub15s' => $sub15s,
      'sub16s' => $sub16s,
      'sub17s' => $sub17s,
      'sub18s' => $sub18s,
      'examinfo' => $examinfo,
      'school' => $school,
   ];
      
    // $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.admit',$data);
     //return $pdf->download($file);
    //  return  $pdf->stream($file,array('Attachment'=>false)); 
     //return $admit->date1;

     //return $data['examinfo']->class;
     return view('pdf.admitfpdf',['data'=>$data]);
 }


}
    

}


