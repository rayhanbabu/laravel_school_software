<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class ExamController extends Controller
{
    function examview(){

        $exam=Exam::orderBy('serial','asc')->get();
        return view('maintain.examview',['exam'=>$exam]);
    }

    public function examinsert(Request $request){

        $validated = $request->validate([
            'babu' => 'required|max:255',
            'text1' => 'required|max:255',
            'text2' => 'required|max:255',
            'serial' => 'required|max:255',
        ]);
        
        $data=Exam::where('serial',$request->input('serial'))->
           where('babu',$request->input('babu'))->count('id');

     if($data>=1){
        return redirect()->back()->with('fail','Category Already Exist');
       }else{
                
                 $exam= new Exam;
                 $exam->serial=$request->input('serial');
                 $exam->babu=$request->input('babu');
                 $exam->text1=substr($request->input('text1'),0,27);
                 $exam->text2=$request->input('text2');
                 $exam->text3=$request->input('text3');
                 $exam->text4=$request->input('text4');
                
                 $exam->save();
                 return redirect()->back()->with('success','Exam Registration Successfull');
       }
    }


       public function examviewid($id){
           $exam=Exam::find($id);
           return response()->json([
            'status'=>500,
            'exam'=>$exam,
           ]);
       }


       public function examupdate(Request $request){
                 $exam=Exam::find($request->input('edit_id'));
                 $exam->serial=$request->input('serial');
                 $exam->babu=$request->input('babu');
                 $exam->text1= $exam->text1=substr($request->input('text1'),0,27);;
                 $exam->text2=$request->input('text2');
                 $exam->text3=$request->input('text3');
                 $exam->text4=$request->input('text4');
                 $exam->update();
                 return redirect()->back()->with('success','Exam Update Successfull');
       }   
       
       
       public function examdelete($id){
           $exam=exam::find($id);
           $exam->delete();
           return redirect()->back()->with('success','Exam Deleted Successfuly');
       }   

}
