<?php

namespace App\Http\Controllers;

use App\Models\Markinfo;
use App\Models\School;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Exports\MarkExport;
use App\Imports\MarkImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Hash;
use Mail;
use Session;
use PDF;

class MarkinfoController extends Controller
{
   
    function markview($class,$babu){
        
            $admin=adminsession();
           $markinfo=Markinfo::where('eiin','=', $admin->eiin)->where('babu',$babu)
           ->where('class',$class)->orderBy('gpa','asc')->get();
           return view('admin.markinfo',['markinfo'=>$markinfo,'admin'=>$admin,'class'=>$class,'babu'=>$babu]);
       }


        public function markinsert(Request $request){

              $admin=adminsession();
              $data= Markinfo::where('babu',$request->input('babu'))->where('class',$request->input('class'))
              ->where('eiin',$admin->eiin)->where('serial',$request->input('serial'))->count('id');
              if($data>=1){
                return redirect()->back()->with('fail','Serial No Already Exist');
              }else{
                       $model= new Markinfo;
                       $model->eiin=$admin->eiin;
                       $model->section=$admin->admin_section;
                       $model->serial=$request->input('serial');
                       $model->class=$request->input('class');
                       $model->babu=$request->input('babu');
                       $model->end=$request->input('end');
                       $model->start=$request->input('start');
                       $model->gpa=$request->input('gpa');
                       $model->grade=$request->input('grade');
                       $model->gparange=$request->input('gparange');
                       $model->save();
                       return redirect()->back()->with('success','Mark Insert Successfull');
              }
           }



           public function markviewid($id){
             $mark=Markinfo::find($id);
              return response()->json([
                  'status'=>500,
                  'subject'=>$mark,
              ]);
          }


          public function markupdate(Request $request){

            $model=Markinfo::find($request->input('edit_id'));
            $model->serial=$request->input('serial');
            $model->class=$request->input('class');
            $model->babu=$request->input('babu');
            $model->end=$request->input('end');
            $model->start=$request->input('start');
            $model->gpa=$request->input('gpa');
            $model->grade=$request->input('grade');
            $model->gparange=$request->input('gparange');
            $model->update();
            return redirect()->back()->with('success','Mark Update Successfull');
    }   
  
  
   public function markdelete($id){
      $subject=Markinfo::find($id);
      $subject->delete();
      return redirect()->back()->with('success','Marks Deleted Successfuly');
   } 
      

   
   public function markexport(Request $request){
       
    $babu=$request->input('babu');
    $class=$request->input('class');
    $eiin=$request->input('eiin');


    $codema='Mark-'.$eiin.$class.$babu;
  
     return (new MarkExport($eiin,$class,$babu))->download($codema.'.csv'); 
   
     //  return $babu;
   }


public function markexcel(Request $request){

   $eiin = $request->input('eiin');
   $class = $request->input('class');
   $babu = $request->input('babu');
   $count_exist=DB::table('markinfos')->where('eiin',adminsession()->eiin)->where('class',$class)
  ->where('babu',$babu)->count('id');
  if($count_exist>=1){
        return back()->with('fail',$class.'-'.$babu.' Mark already exist');   
  }else{
         Excel::Import(new MarkImport,request()->file('file'));
         return redirect()->back()->with('status', 'Import Successfull');  
        //  return $fileName;
  }
}


public function markimport(Request $request){
  $eiin = $request->input('eiin');
  $class = $request->input('class');
  $babu = $request->input('babu');
  $count_exist=DB::table('markinfos')->where('eiin',adminsession()->eiin)->where('class',$class)
  ->where('babu',$babu)->count('id');
  if($count_exist>=1){
        return back()->with('fail',$class.'-'.$babu.' Marks already exist');   
  }else{
      $subject=Markinfo::where('eiin','=',$eiin)->where('class',$class)
      ->where('babu',$babu)->orderBy('serial','asc')->get();
      foreach($subject as $row){ 
          $subject= new Markinfo;
          $subject->eiin=adminsession()->eiin;
          $subject->serial=$row['serial'];
          $subject->class=$row['class'];
          $subject->babu=$row['babu'];
          $subject->start=$row['start'];
          $subject->end=$row['end'];
          $subject->gpa=$row['gpa'];
          $subject->grade=$row['grade'];
          $subject->gparange=$row['gparange'];
          $subject->save(); 
      }
   return redirect()->back()->with('status','Update Information');   
  }
}



}
