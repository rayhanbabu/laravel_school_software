<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Student;
use App\Models\Mark;
use App\Models\Examinfo;
use App\Models\Subject;
use App\Models\Markinfo;
use App\Models\Subjectauth;
use App\Models\Calculation;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class TenCoController extends Controller
{
    public function TenCoinput(){
        $school=schoolsession();
        $subject=Subject::where('class','Ten')->where('babu','Commerce')->where('eiin',$school->eiin)->orderBy('subcode','asc')->get();
        return view('TenCo.input',['school'=>$school,'subject'=>$subject]);
    }
 

  /// Subject  View Page
 public function TenCosub($tecode){
  if(Session::has('school')){ 
       $school=schoolsession();
       $subject=Subject::where('class','Ten')->where('babu','Commerce')->where('eiin',$school->eiin)->orderBy('subcode','asc')->get();
       $name=Subject::where('tecode',substr($tecode,0,10))->where('eiin',$school->eiin)->first();
       $tecodesection=$tecode.Session::get('section').$name->subid;
       return view('TenCo.'.$name->subcode,['school'=>$school,'subject'=>$subject,'name'=>$name ,'tecodesection'=>$tecodesection]);

   }else if(Session::has('teacher')){

    $subjectauth=Subjectauth::where('teacher_id',teachersession()->id)->get();
    if(!empty(teacher_access($tecode,$subjectauth))){ 
      $name=Subject::where('tecode',substr($tecode,0,10))->where('eiin',teachersession()->eiin)->first();
       $tecodesection=$tecode.teacher_access($tecode,$subjectauth)['lavel'];
      return view('TenCo.'.$name->subcode,['name'=>$name,'tecodesection'=>$tecodesection]);
        }else{
      return '<h2 class="text-danger">Page Not Found</h2>';
       }
    }
}




     public function TenCoSelect($tecodesection){
      if(Session::has('school')){ 
        $school=schoolsession();
        $examinfo = Examinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
        $sstatus=Subject::where('tecode',substr($tecodesection,0,10))->where('eiin',$school->eiin)->first();
     
    $student = DB::table('marks')
       ->leftjoin('students','students.id', '=','marks.uid')
       ->where('marks.babu','Commerce')->where('marks.class','Ten')->where('marks.section',substr($tecodesection,10,1))
       ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
       ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
       ->orderBy('marks.roll','asc')->get();
     }else if(Session::has('teacher')){
      
          $school=School::where('eiin',teachersession()->eiin)->first();
          $examinfo=Examinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
          $sstatus=Subject::where('tecode',substr($tecodesection,0,10))->where('eiin',$school->eiin)->first();
          $subsn=substr($tecodesection,5,5).'sn';
          $lavel=substr($tecodesection,11,25);

        if($sstatus->subid>20000){
              $student=DB::table('marks')
              ->leftjoin('students','students.id','=','marks.uid')
              ->where('marks.babu','Commerce')->where('marks.class','Ten')->where('marks.section',substr($tecodesection,10,1))
              ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
              ->where('marks.'.$subsn,$lavel)
              ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
              ->orderBy('marks.roll','asc')->get();
         }else{
             $student=DB::table('marks')
             ->leftjoin('students','students.id','=','marks.uid')
             ->where('marks.babu','Commerce')->where('marks.class','Ten')->where('marks.section',substr($tecodesection,10,1))
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


   public function TenCosub_update(Request $request){

    if(Session::has('school')){ 
            $school=schoolsession();
        }else if(Session::has('teacher')){
            $school=teachersession();
       }
     $markinfo =Markinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->get();

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
     



   public function TenCosub_update12(Request $request){

    if(Session::has('school')){ 
            $school=schoolsession();
        }else if(Session::has('teacher')){
            $school=teachersession();
       }
      $markinfo = Markinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->get();
   
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
   
       foreach($request->id as  $key=>$items){ 
   
                   if($request->sub11c[$key]==''){$sub11c=0;}else{
                 $sub11c=$request->sub11c[$key];}
   
                if($request->sub11m[$key]==''){$sub11m=0;}else{
              $sub11m=$request->sub11m[$key];}
   
              if($request->sub12c[$key]==''){$sub12c=0;}else{
            $sub12c=$request->sub12c[$key];}
    
          if($request->sub12m[$key]==''){$sub12m=0;}else{
       $sub12m=$request->sub12m[$key];}
             
           $subc=$sub11c+$sub12c;
           $subm=$sub11m+$sub12m;
           $id    =$request->id[$key];
           $total =$sub11c+$sub11m+$sub12c+$sub12m;
   
           $gpa12=gpa12($subc,$cfail,$subm,$mfail,$total,$markinfo,$tmark);
           $grade12=grade12($subc,$cfail,$subm,$mfail,$total,$markinfo,$tmark);
           
   
            DB::update(
            "update marks set sub11c ='$sub11c', sub11m ='$sub11m', sub12c ='$sub12c', sub12m ='$sub12m', sub12t ='$total'
                 ,$tsubn='$subname', $tsubcode='$subid', sub12gp='$gpa12',sub12g='$grade12'           
                 where id = '$id'"
             );
          
          }
   
          return response()->json([
            'status'=>100, 
            'message'=>'Data Updated',  
         ]);
   
   
      
      }
   
   
   
   public function TenCosub_update14(Request $request){
   
       if(Session::has('school')){ 
            $school=schoolsession();
        }else if(Session::has('teacher')){
            $school=teachersession();
       }
       
      $markinfo = Markinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->get();
   
   
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
    
               if($request->sub13c[$key]==''){$sub13c=0;}else{
            $sub13c=$request->sub13c[$key];}
   
            if($request->sub14c[$key]==''){$sub14c=0;}else{
               $sub14c=$request->sub14c[$key];}
    
           
            $subc  =$sub13c+$sub14c;
            $id    =$request->id[$key];
            $total =$sub13c+$sub14c;
   
            $gpa14=gpa14($subc,$cfail,$total,$markinfo,$tmark);
            $grade14=grade14($subc,$cfail,$total,$markinfo,$tmark);
    
              DB::update(
                 "update marks set sub13c ='$sub13c', sub14c ='$sub14c', sub14t ='$total'
                    ,$tsubn='$subname', $tsubcode='$subid', sub14gp='$gpa14',sub14g='$grade14'           
                     where id = '$id'"
                );
            }
    
           return response()->json([
              'status'=>100,  
              'message'=>'Data Updated',  
            ]);
      }
   
   
   
      public function TenCosub_update16(Request $request){
         
         if(Session::has('school')){ 
            $school=schoolsession();
         }else if(Session::has('teacher')){
            $school=teachersession();
         }
         $markinfo = Markinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->get();
   
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
                       "update marks set $tsubc ='$subc', $tsubm ='$subm', $tsubp ='$subp', $tsubt ='$total',
                          $tsubgp='$gpa', $tsubg='$grade',$tsubcode='$subid'            
                            where id = '$id'"
                      );
           }
                  
                return response()->json([
                   'status'=>100, 
                   'message'=>'Data Updated',  
                ]);
   
        }
        
        
        
     public function TenCosub_update24(Request $request){

      if(Session::has('school')){ 
          $school=schoolsession();
      }else if(Session::has('teacher')){
          $school=teachersession();
      }

      
      $markinfo = Markinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->get();

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
                     $tsubg='$grade' , $tsubcode='$subid'  ,
                       
          $tsubgp=(CASE 
               WHEN  $subc <$cfail THEN 0
               WHEN  $subm <$mfail THEN 0
               WHEN  $subp <$pfail THEN 0
               WHEN  $total>=80*$tmark/100 AND  $total<=100*$tmark/100 THEN 3
               WHEN  $total>=70*$tmark/100 AND  $total<80*$tmark/100 THEN 2
               WHEN  $total>=60*$tmark/100 AND  $total<70*$tmark/100 THEN 1.5
               WHEN  $total>=50*$tmark/100 AND  $total<60*$tmark/100 THEN 1
               WHEN  $total>=40*$tmark/100 AND  $total<50*$tmark/100 THEN 0
               WHEN  $total>=33*$tmark/100 AND  $total<40*$tmark/100 THEN 0
               ELSE 0 END),
               
           $tsubg=(CASE 
               WHEN  $total =0 THEN 'Abs'
               WHEN  $subc <$cfail THEN 'F'
               WHEN  $subm <$mfail THEN 'F'
               WHEN  $subp <$pfail THEN 'F'
               WHEN  $total>=80*$tmark/100 AND  $total<=100*$tmark/100 THEN '5-A+'
               WHEN  $total>=70*$tmark/100 AND  $total<80*$tmark/100 THEN '4-A'
               WHEN  $total>=60*$tmark/100 AND  $total<70*$tmark/100 THEN '3.5 A-'
               WHEN  $total>=50*$tmark/100 AND  $total<60*$tmark/100 THEN '3-B'
               WHEN  $total>=40*$tmark/100 AND  $total<50*$tmark/100 THEN '2-C'
               WHEN  $total>=33*$tmark/100 AND  $total<40*$tmark/100 THEN '1-D'
                ELSE 'F' END)
                       
                         where id = '$id'"
                   );
        }
               
             return response()->json([
                'status'=>100, 
                'message'=>'Data Updated',  
             ]);

     }
         
 



 public function TenCoresult(Request $request){
         
       $school=schoolsession();
       $subject=Subject::where('class','Ten')->where('babu','Commerce')->where('eiin',$school->eiin)->orderBy('subcode','asc')->get();
       $name=Subject::where('class','Ten')->where('babu','Commerce')->where('eiin',$school->eiin)->first();
       $examinfo = Examinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
    
       $mainsubject=Calculation::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
       $subcode1=$mainsubject->subcode;  
       $tags=explode(',',$subcode1);

        $student = DB::table('marks')
        ->leftjoin('students','students.id', '=', 'marks.uid')
        ->where('marks.babu','Commerce')->where('marks.class','Ten')->where('marks.section',Session::get('section'))
        ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
        ->select('students.name','students.stu_id','students.roll','students.moral','students.main','students.addi','marks.*')
        ->orderBy('students.roll','asc')->get();
      
      
         $student1=$student->first();
         
         
    if($student1){      
       return view('TenCo.result',['school'=>$school,'subject'=>$subject ,'name'=>$name,'student'=>$student,'tags'=>$tags,'student1'=>$student1]);}else{
         return redirect("/TenCoinput")->with('status','This section No Students');
      }
   
 }


  public function resulttype(Request $request){
      $school=schoolsession();
      $examinfo = Examinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
      $type=$request->input('type');
      $section=Session::get('section');
      DB::update("update marks set rs ='$type'  where babu='Commerce' AND class='Ten' AND section='$section'
      AND exam='$examinfo->exam' AND year='$examinfo->year' AND eiin='$school->eiin' ");
      return back()->with('success','Result Type Update ');
  }


      
 


  public function TenCoresultupdate(Request $request){

    
    $school=School::where('eiin',Session::get('school')->eiin)->first();
    $examinfo=Examinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
    $section=Session::get('section');

     $max=DB::table('marks')->where('babu','Commerce')->where('class','Ten')->where('section',Session::get('section'))
      ->where('exam',$examinfo->exam)->where('year',$examinfo->year)->where('eiin',$school->eiin)
      ->select(DB::raw("Max(sub11t) as sub11h ") ,DB::raw("Max(sub12t) as sub12h") ,DB::raw("Max(sub13t) as sub13h")
      ,DB::raw("Max(sub14t) as sub14h"),DB::raw("Max(sub15t) as sub15h"),DB::raw("Max(sub16t) as sub16h")
      ,DB::raw("Max(sub17t) as sub17h"),DB::raw("Max(sub18t) as sub18h"),DB::raw("Max(sub19t) as sub19h")
      ,DB::raw("Max(sub20t) as sub20h"),DB::raw("Max(sub21t) as sub21h"),DB::raw("Max(sub22t) as sub22h")
      ,DB::raw("Max(sub23t) as sub23h"),DB::raw("Max(sub24t) as sub24h"))->first();

     $markinfo=Markinfo::where('babu','Commerce')->where('class','Ten')->where('eiin',Session::get('school')->eiin)->get();
     $mainsubject=Calculation::where('babu','Commerce')->where('class','Ten')->where('eiin',$school->eiin)->first();
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

          $tfail=$totalsub-($totalpass+2);     
        
          if($tfail==0){
                  $gpa1=$totalgpa/($totalsub-3);     
          }else if($sub24gp==0.00 &&  $tfail==1){
                  $gpa1=$totalgpa/($totalsub-3);   
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
