<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Student;
use App\Models\Mark;
use App\Models\Examinfo;
use App\Models\Subject;
use App\Models\Subjectauth;
use App\Models\Markinfo;
use App\Models\Calculation;
use DB;
use Hash;
use Mail;
use Session;
use PDF;

class SixNaController extends Controller
{
    public function SixNainput(){
        $school=schoolsession();
        $subject=Subject::where('class','Six')->where('babu','NA')->where('eiin',$school->eiin)->orderBy('subcode','asc')->get();
        return view('SixNa.input',['school'=>$school,'subject'=>$subject]);
    }
 

  /// Subject  View Page
 public function SixNasub($tecode){
  if(Session::has('school')){ 
         $school=schoolsession();
         $subject=Subject::where('class','Six')->where('babu','NA')->where('eiin',$school->eiin)->orderBy('subcode','asc')->get();
         $name=Subject::where('tecode',substr($tecode,0,10))->where('eiin',$school->eiin)->first();
         $tecodesection=$tecode.Session::get('section').$name->subid;
       return view('SixNa.'.$name->subcode,['school'=>$school,'subject'=>$subject,'name'=>$name ,'tecodesection'=>$tecodesection]);

     }else if(Session::has('teacher')){
               $subjectauth=Subjectauth::where('teacher_id',teachersession()->id)->get();
         if(!empty(teacher_access($tecode,$subjectauth))){
               $name=Subject::where('tecode',substr($tecode,0,10))->first();
               $tecodesection=$tecode.teacher_access($tecode,$subjectauth)['lavel'];
              return view('SixNa.'.$name->subcode,['name'=>$name,'tecodesection'=>$tecodesection]);
                }else{
               return '<h2 class="text-danger">Page Not Found</h2>';
              }
         }
 }




   public function SixNaSelect($tecodesection){


            if(Session::has('school')){ 
                $school=schoolsession();
                  $examinfo = Examinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
                  $sstatus=Subject::where('tecode',substr($tecodesection,0,10))->where('eiin',$school->eiin)->first();
               
              $student = DB::table('marks')
                 ->leftjoin('students', 'students.id', '=', 'marks.uid')
                 ->where('marks.babu','NA')->where('marks.class','Six')->where('marks.section',substr($tecodesection,10,1))
                 ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
                 ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
                 ->orderBy('marks.roll','asc')->get();

             }else if(Session::has('teacher')){
                  $school=School::where('eiin',teachersession()->eiin)->first();
                  $examinfo = Examinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
                  $sstatus=Subject::where('tecode',substr($tecodesection,0,10))->where('eiin',$school->eiin)->first();
                  $subsn=substr($tecodesection,5,5).'sn';
                  $lavel=substr($tecodesection,11,25);
       
              if($sstatus->subid>20000){
                  $student=DB::table('marks')
                       ->leftjoin('students','students.id','=','marks.uid')
                       ->where('marks.babu','NA')->where('marks.class','Six')->where('marks.section',substr($tecodesection,10,1))
                       ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
                       ->where('marks.'.$subsn,$lavel)
                       ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
                       ->orderBy('marks.roll','asc')->get();
                 }else{
                   $student=DB::table('marks')
                       ->leftjoin('students','students.id', '=','marks.uid')
                       ->where('marks.babu','NA')->where('marks.class','Six')->where('marks.section',substr($tecodesection,10,1))
                       ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
                       ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
                       ->orderBy('marks.roll','asc')->get();                                    
                  }

              }
       
    
              
     
            return response()->json([
                   'status'=>100,  
                   'data'=>$student,
                   'sstatus'=>$sstatus,
              ]);  


     }


public function SixNasub_update(Request $request){

   if(Session::has('school')){ 
      $school=schoolsession();
   }else if(Session::has('teacher')){
      $school=teachersession();
   }



   $markinfo = Markinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->get();

         $cfail=$request->input('cfail');
         $mfail=$request->input('mfail');
         $pfail=$request->input('pfail');
         $tmark=$request->input('tmark');
         $subname=$request->input('subname');
         $subid=$request->input('subid');
         $subcode=$request->input('subcode');
   
         $tsubc=$subcode.'c';
         $tsubm=$subcode.'m';
         $tsubp=$subcode.'p';
         $tsubt=$subcode.'t';
         $tsubgp=$subcode.'gp';
         $tsubg=$subcode.'g';
         $tsubn=$subcode.'n';
         $tsubcode=$subcode.'code'; 
   
           foreach($request->id as  $key=>$items ){ 
   
                   if($request->subc[$key]==''){$subc=0;}else{
                $subc=$request->subc[$key];}
   
                   if($request->subm[$key]==''){$subm=0;}else{
                $subm=$request->subm[$key];}
   
                    if($request->subp[$key]==''){$subp=0;}else{
                $subp=$request->subp[$key];}
   
                $id    =$request->id[$key];
                $total =$subc+$subm+$subp;
      
 
          $gpa=gpa($subc,$cfail,$subm,$mfail,$subp,$pfail,$total,$markinfo,$tmark);
          $grade= grade($subc,$cfail,$subm,$mfail,$subp,$pfail,$total,$markinfo,$tmark);
   
               DB::update(
                   "update marks set $tsubc ='$subc', $tsubm ='$subm', $tsubp ='$subp' , $tsubt ='$total',
                      $tsubgp='$gpa', $tsubg='$grade' ,$tsubn='$subname' , $tsubcode='$subid'            
                        where id = '$id'"
                  );
           }
              
            return response()->json([
               'status'=>100, 
               'message'=>'Data Updated',  
            ]);

 }




 
   public function SixNasub_update16(Request $request){
      

      if(Session::has('school')){ 
           $school=schoolsession();
      }else if(Session::has('teacher')){
          $school=teachersession();
      }


      $markinfo = Markinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->get();

         $cfail=$request->input('cfail');
         $mfail=$request->input('mfail');
         $pfail=$request->input('pfail');
         $tmark=$request->input('tmark');
         $subname=$request->input('subname');
         $subid=$request->input('subid');
         $subcode=$request->input('subcode');
   
         $tsubc=$subcode.'c';
         $tsubm=$subcode.'m';
         $tsubp=$subcode.'p';
         $tsubt=$subcode.'t';
         $tsubgp=$subcode.'gp';
         $tsubg=$subcode.'g';
         $tsubn=$subcode.'n';
         $tsubcode=$subcode.'code'; 
   
           foreach($request->id as  $key=>$items ){ 
   
                  if($request->subc[$key]==''){$subc=0;}else{
               $subc=$request->subc[$key];}
   
                  if($request->subm[$key]==''){$subm=0;}else{
               $subm=$request->subm[$key];}
   
                   if($request->subp[$key]==''){$subp=0;}else{
               $subp=$request->subp[$key];}
   
                $id    =$request->id[$key];
                $total =$subc+$subm+$subp;
      
 
          $gpa=gpa($subc,$cfail,$subm,$mfail,$subp,$pfail,$total,$markinfo,$tmark);
          $grade= grade($subc,$cfail,$subm,$mfail,$subp,$pfail,$total,$markinfo,$tmark);
        
   
               DB::update(
                   "update marks set $tsubc ='$subc', $tsubm ='$subm', $tsubp ='$subp' , $tsubt ='$total',
                      $tsubgp='$gpa', $tsubg='$grade' , $tsubcode='$subid'            
                        where id = '$id'"
                  );
           }
              
            return response()->json([
               'status'=>100, 
               'message'=>'Data Updated',  
            ]);
    }
     


 public function SixNaresult(Request $request){ 

    $school=schoolsession();
    $subject=Subject::where('class','Six')->where('babu','NA')->where('eiin',$school->eiin)->orderBy('subcode','asc')->get();
    $name=Subject::where('class','Six')->where('babu','NA')->where('eiin',$school->eiin)->first();
    $examinfo = Examinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
    
    
     $mainsubject=Calculation::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
 
    $student = DB::table('marks')
      ->leftjoin('students', 'students.id', '=', 'marks.uid')
      ->where('marks.babu','NA')->where('marks.class','Six')->where('marks.section',Session::get('section'))
      ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
      ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
      ->orderBy('students.roll','asc')->get();
      
      $student1=$student->first();
      
      if($student1 && $mainsubject){
            
          $subcode1=$mainsubject->subcode;  
         $tags=explode(',',$subcode1);  
    return view('SixNa.result',['school'=>$school,'subject'=>$subject ,'name'=>$name,'student'=>$student,'tags'=>$tags,'student1'=>$student1]);
        }else{
         return redirect("/SixNainput")->with('status','This section No Students OR No Subject Setup');
      }
      
    
 }

    



   public function resulttype(Request $request){
        $school=schoolsession();
        $examinfo = Examinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
        $type=$request->input('type');
        $section=Session::get('section');
        DB::update("update marks set rs ='$type'  where babu='NA' AND class='Six' AND section='$section'
        AND exam='$examinfo->exam' AND year='$examinfo->year' AND eiin='$school->eiin' ");
        return back()->with('success','Result Type Update ');
   }


 public function SixNaresultupdate(Request $request){

   $school=School::where('eiin',Session::get('school')->eiin)->first();
   $examinfo=Examinfo::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
   $section=Session::get('section');

   $max=DB::table('marks')->where('babu','NA')->where('class','Six')->where('section',Session::get('section'))
   ->where('exam',$examinfo->exam)->where('year',$examinfo->year)->where('eiin',$school->eiin)
   ->select(DB::raw("Max(sub11t) as sub11h ") ,DB::raw("Max(sub12t) as sub12h") ,DB::raw("Max(sub13t) as sub13h")
   ,DB::raw("Max(sub14t) as sub14h"),DB::raw("Max(sub15t) as sub15h"),DB::raw("Max(sub16t) as sub16h")
   ,DB::raw("Max(sub17t) as sub17h"),DB::raw("Max(sub18t) as sub18h"),DB::raw("Max(sub19t) as sub19h")
   ,DB::raw("Max(sub20t) as sub20h"),DB::raw("Max(sub21t) as sub21h"),DB::raw("Max(sub22t) as sub22h")
   ,DB::raw("Max(sub23t) as sub23h"),DB::raw("Max(sub24t) as sub24h"))->first();

     $markinfo=Markinfo::where('babu','NA')->where('class','Six')->where('eiin',Session::get('school')->eiin)->get();
     $mainsubject=Calculation::where('babu','NA')->where('class','Six')->where('eiin',$school->eiin)->first();
     $subcode1=$mainsubject->subcode;  
     $tags=explode(',',$subcode1);
     $totalsub=(count($tags)-1);

    

   foreach($request->id as  $key=>$items ){ 
              $id    =$request->id[$key];  
            if(empty(matchsubcode($request->sub11code[$key],$tags))){$sub11gp=0;}else{
                  $sub11gp=$request->sub11gp[$key];}

            if(empty(matchsubcode($request->sub12code[$key],$tags))){$sub12gp=0;}else{
                  $sub12gp=$request->sub12gp[$key];} 
                  
            if(empty(matchsubcode($request->sub13code[$key],$tags))){$sub13gp=0;}else{
                    $sub13gp=$request->sub13gp[$key];}    
                    
           if(empty(matchsubcode($request->sub14code[$key],$tags))){$sub14gp=0;}else{
                 $sub14gp=$request->sub14gp[$key];}
                 
           if(empty(matchsubcode($request->sub15code[$key],$tags))){$sub15gp=0;}else{
                $sub15gp=$request->sub15gp[$key];}  
                
           if(empty(matchsubcode($request->sub16code[$key],$tags))){$sub16gp=0;}else{
                $sub16gp=$request->sub16gp[$key];} 
                
          if(empty(matchsubcode($request->sub17code[$key],$tags))){$sub17gp=0;}else{
                $sub17gp=$request->sub17gp[$key];}   
                
          if(empty(matchsubcode($request->sub18code[$key],$tags))){$sub18gp=0;}else{
                  $sub18gp=$request->sub18gp[$key];}  
                  
          if(empty(matchsubcode($request->sub19code[$key],$tags))){$sub19gp=0;}else{
               $sub19gp=$request->sub19gp[$key];} 
               
          if(empty(matchsubcode($request->sub20code[$key],$tags))){$sub20gp=0;}else{
                  $sub20gp=$request->sub20gp[$key];}  

          if(empty(matchsubcode($request->sub21code[$key],$tags))){$sub21gp=0;}else{
                   $sub21gp=$request->sub21gp[$key];} 
                        
          if(empty(matchsubcode($request->sub22code[$key],$tags))){$sub22gp=0;}else{
                 $sub22gp=$request->sub22gp[$key];} 
                 
         if(empty(matchsubcode($request->sub23code[$key],$tags))){$sub23gp=0;}else{
              $sub23gp=$request->sub23gp[$key];}  
              
         if(empty(matchsubcode($request->sub24code[$key],$tags))){$sub24gp=0;}else{
             $sub24gp=$request->sub24gp[$key];}            

      
       if($sub11gp>0){$sub11n=1; }else{$sub11n=0;}
       if($sub12gp>0){$sub12n=1; }else{$sub12n=0;}
       if($sub13gp>0){$sub13n=1; }else{$sub13n=0;}
       if($sub14gp>0){$sub14n=1; }else{$sub14n=0;}
       if($sub15gp>0){$sub15n=1; }else{$sub15n=0;}
       if($sub16gp>0){$sub16n=1; }else{$sub16n=0;}
       if($sub17gp>0){$sub17n=1; }else{$sub17n=0;}
       if($sub18gp>0){$sub18n=1; }else{$sub18n=0;}
       if($sub19gp>0){$sub19n=1; }else{$sub19n=0;}
       if($sub20gp>0){$sub20n=1; }else{$sub20n=0;}
       if($sub21gp>0){$sub21n=1; }else{$sub21n=0;}
       if($sub22gp>0){$sub22n=1; }else{$sub22n=0;}
       if($sub23gp>0){$sub23n=1; }else{$sub23n=0;}
       if($sub24gp>0){$sub24n=1; }else{$sub24n=0;}


       $totalgpa=$sub11gp+$sub12gp+$sub13gp+$sub14gp+$sub15gp+$sub16gp+$sub17gp+$sub18gp
       +$sub19gp+$sub20gp+$sub21gp+$sub22gp+$sub23gp+$sub24gp;


        $totalpass=$sub11n+$sub12n+$sub13n+$sub14n+$sub15n+$sub16n+$sub17n
                      +$sub18n+$sub19n+$sub20n+$sub21n+$sub22n+$sub23n+$sub24n;

        $tfail=$totalsub-$totalpass;                

        if($totalsub==$totalpass){
             $gpa1=$totalgpa/$totalsub;
         }else{
              $gpa1=0.00;
         }

      if($gpa1>0){$result='Passed'; }else{$result='Failed';}

      if($gpa1>5.00){$gpa=5.00;}else{$gpa=$gpa1;}

      $g=empty(gradefinal($gpa,$markinfo))?'F':gradefinal($gpa,$markinfo);
      $cgp=($gpa+$request->fgp[$key])/$request->rs[$key];
      $cg=empty(gradefinal($cgp,$markinfo))?'F':gradefinal($cgp,$markinfo);

         DB::update(
               "update marks set totalgpa ='$totalgpa',tfail ='$tfail' ,gpa1 ='$gpa1',gpa ='$gpa',result ='$result'  
                ,g='$g',cgp='$cgp',cg='$cg'
                ,sub11h ='$max->sub11h' ,sub12h ='$max->sub12h' ,sub13h ='$max->sub13h'
                ,sub14h ='$max->sub14h',sub15h ='$max->sub15h',sub16h ='$max->sub16h',sub17h ='$max->sub17h'
                ,sub18h ='$max->sub18h',sub19h ='$max->sub19h',sub20h ='$max->sub20h',sub21h ='$max->sub21h'
                ,sub22h ='$max->sub22h',sub23h ='$max->sub23h',sub24h ='$max->sub24h'
                
        ,sub11='$sub11n',sub12='$sub12n',sub13='$sub13n' ,sub14='$sub14n'
        ,sub15='$sub15n',sub16='$sub16n',sub17='$sub17n' ,sub18='$sub18n'
        ,sub19='$sub19n',sub20='$sub20n',sub21='$sub21n' ,sub22='$sub22n'
        ,sub23='$sub23n' ,sub24='$sub24n'
                
                ,total=sub11t+sub12t+sub13t+sub14t+sub15t+sub16t+sub17t+sub18t+sub19t+sub20t+sub21t+sub22t+sub23t+sub24t  
                where id = '$id'"
           ); 
   }

     //prx($_POST);
     //die();
   return back()->with('success','Update Information');

 }

 


}
