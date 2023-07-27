<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Atten;
use App\Models\School;
use App\Models\Student;
use App\Models\Exam;
use Hash;
use Mail;
use Session;
use PDF;


class AttenController extends Controller
{
     function index(){
        if(Session::has('school')){ 
              $school=schoolsession();  
         }elseif(Session::has('teacher')){
            $school=teachersession();   
         }
        
        $classrow=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $grouprow=Exam::where('babu','group')->orderBy('serial','asc')->get();
        $sectionrow=Exam::where('babu','section')->orderBy('serial','asc')->get();
        
         if(isset($_GET['group']) && isset($_GET['class']) && isset($_GET['date']) && isset($_GET['action']) ){
               $group=$_GET['group'];
               $class=$_GET['class'];
               $date=$_GET['date'];
               $action=$_GET['action'];
               $section=$_GET['section'];
          }else{
              $group='';
              $class='';
              $date='';
              $action='';  
              $section='';  
          }
           $data=[];
           $fail='';
              
          if(empty($section) && empty($group) ){
                  $atten=Atten::where('class',$class)
                  ->where('date',$date)->where('eiin',$school->eiin)->get();
           }else if(empty($section)){
                  $atten=Atten::where('babu',$group)->where('class',$class)
                 ->where('date',$date)->where('eiin',$school->eiin)->get();
           }else if(empty($group)){
                  $atten=Atten::where('class',$class)->where('section',$section)
                 ->where('date',$date)->where('eiin',$school->eiin)->get();
            }else{
                $atten=Atten::where('babu',$group)->where('class',$class)->where('section',$section)
               ->where('date',$date)->where('eiin',$school->eiin)->get();
            }
           
            if($action=='add'){   
                 if($atten->count()>0){
                       $fail="Attendance Already Recorded";
                 }else{
                     if(empty($section) && empty($group) ){
                           $data=Student::where('class',$class)
                          ->where('eiin',$school->eiin)->get();
                     }else if(empty($section)){
                           $data=Student::where('babu',$group)->where('class',$class)
                          ->where('eiin',$school->eiin)->get();
                     }else if(empty($group)){
                           $data=Student::where('class',$class)->where('section',$section)
                           ->where('eiin',$school->eiin)->get();
                     }else{
                           $data=Student::where('babu',$group)->where('class',$class)->where('section',$section)
                           ->where('eiin',$school->eiin)->get();
                      }
                 } 
             }

            if($action=='edit'){
                   if($atten->count()>0){
                       $data=$atten;
                     }else{
                       $fail="Data not Found";
                    }
             } 

         return  view('school.atten',['school'=>$school,'group'=>$group,'class'=>$class,'date'=>$date,
        'data'=>$data,'fail'=>$fail,'action'=>$action,'classrow'=>$classrow,'grouprow'=>$grouprow,'sectionrow'=>$sectionrow]);
              
          }
            
           

    
       //
      // return $class;
     


public function store(Request $request){

    if(Session::has('school')){ 
         $school=schoolsession();  
      }elseif(Session::has('teacher')){
         $school=teachersession();   
      }

      
    if($request->input('action')=='add'){
             $date=$request->input('date');
             $ispresent = array();
         if (isset($_POST['chbox'])){
              $ispresent= $_POST['chbox'];	


              foreach($request->uid as  $key=>$items ){  
                 if (count($ispresent)) {
                    $p=(in_array($request->uid[$key], $ispresent)) ? 1 : 0;	
                 }
                $atten= new Atten;    
                $atten->date=$date;
                $atten->month=date('n',strtotime($date));
                $atten->year=date('Y',strtotime($date));
                $atten->day=date('j',strtotime($date));
                $atten->uid=$request->uid[$key];
                $atten->eiin=$request->eiin[$key];
                $atten->class=$request->class[$key];
                $atten->babu=$request->babu[$key];
                $atten->section=$request->section[$key];
                $atten->status=$p;
                $atten->save();
              }

              return redirect('/atten')->with('success','Attendance Insert  successfully');

          }else{
              return redirect('/atten')->with('danger','Something Error!! All Student can not Absence');
          }

       
      }



   
    elseif($request->input('action') =='edit'){
        $date=$request->input('date');
        $ispresent = array();
           if (isset($_POST['chbox'])) {
            $ispresent= $_POST['chbox'];	
            }

           foreach($request->id as  $key=>$items ){ 

           if(count($ispresent)){
               $p = (in_array($request->id[$key], $ispresent)) ? 1 : 0;	
            }
            $atten=Atten::find($request->id[$key]);
            $atten->date=$date;
            $atten->month=date('n',strtotime($date));
            $atten->year=date('Y',strtotime($date));
            $atten->day=date('j',strtotime($date));
            $atten->eiin=$request->eiin[$key];
            $atten->class=$request->class[$key];
            $atten->babu=$request->babu[$key];
            $atten->section=$request->section[$key];
            $atten->status=$p;
            $atten->save();
             }
           return redirect('/atten')->with('success','Attendance Update  successfully');
       }else{
        return redirect('/atten')->with('danger','No Access . Please contact head office');
       }
     
     
       // return  veiw('atten');
     }



     public function attenview(Request $request){

        $school=schoolsession();
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
        $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
    
    return view('school.attenindex',['school'=>$school,'exam'=>$exam,'year'=>$year,'class'=>$class,'group'=>$group]);
     }


      public function attenpdf(Request $request){
          $school=schoolsession();
          $month=date('n',strtotime($_POST['month']));
          $year=date('Y',strtotime($_POST['month']));
          $class=$request->input('class');
          $babu=$request->input('babu');
          $section=$request->input('section');

          $file='Attendance'.$request->input('month').'.pdf';
   
       $student=DB::table('attens')->where('year',$year)->where('month',$month)->where('eiin',$school->eiin)
         ->where('class',$class)->where('babu',$babu)->where('section',$section)
         ->select('uid',DB::raw('sum(status) as total_atten') ,DB::raw('max(month) as max_month')
         ,DB::raw('max(year) as max_year'),DB::raw('count(status) as total_class'))
         ->orderBy('id','asc')->groupBy('uid')->get();

       $day=DB::table('attens')->where('year',$year)->where('month',$month)->where('eiin',$school->eiin)
         ->where('class',$class)->where('babu',$babu)->where('section',$section)
         ->select('day',DB::raw('sum(status) as total_day'))
         ->orderBy('day','asc')->groupBy('day')->get();


     // return $day;
     // die();

           if($student->count()>0){

            $data=[
                'title' => 'Welcome to OnlineWebTutorBlog.com',
                'student' => $student,
                'total_class' =>$student[0]->total_class,
                'month' => $request->input('month'),
                'class' => $class,
                'babu' => $babu,
                'section' => $section,
                'day' => $day,
                'school' => $school,
             ];	

            $pdf=PDF::setPaper('a4','landscape')->loadView('pdf.atten',$data);
            //return $pdf->download($file);
            return $pdf->stream($file,array('Attachment'=>false));
           }else{
            return redirect()->back()->with('danger','No Found Data');
           }
          
        

       
      }
    

}
