<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\File;
use App\Models\School;
use DB;
use Session;
use App\Exports\SubjectExport;
use App\Imports\SubjectImport;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    function subjectview($class,$babu){
       
        $admin=adminsession();
        $subject=Subject::where('eiin','=',$admin->eiin)->where('babu',$babu)
        ->where('class',$class)->orderBy('subid','asc')->get();
        return view('admin.subjectview',['subject'=>$subject,'admin'=>$admin,'class'=>$class,'babu'=>$babu]);
    }

    public function subjectinsert(Request $request){

        $validated=$request->validate([
             'subject' => 'required|max:255',
             'subid' => 'required|max:255',
        ]);

     $data=Subject::where('subid',$request->input('subid'))->where('eiin',$request->input('eiin'))->count('id');

     $data1=Subject::where('subcode',$request->input('subcode'))->where('eiin',$request->input('eiin'))
       ->where('class',$request->input('class'))->where('babu',$request->input('babu'))->count('id');

     if($data>=1 OR $data1>=1){
        return redirect()->back()->with('fail','Subject Id Or Subject Code Already Exist');
       }else{
                 $tecode=substr($request->input('class'),0,3).substr($request->input('babu'),0,2).$request->input('subcode');
                 $subject= new Subject;
                 $subject->subid=$request->input('subid');
                 $subject->subcode=$request->input('subcode');
                 $subject->class=$request->input('class');
                 $subject->babu=$request->input('babu');
                 $subject->eiin=$request->input('eiin');
                 $subject->subject=$request->input('subject');
                 $subject->tmark=$request->input('tmark');
                 $subject->cstatus=$request->input('cstatus');
                 $subject->mstatus=$request->input('mstatus');
                 $subject->pstatus=$request->input('pstatus');
                 $subject->cmark=$request->input('cmark');
                 $subject->mmark=$request->input('mmark');
                 $subject->pmark=$request->input('pmark');
                 $subject->cfail=$request->input('cfail');
                 $subject->mfail=$request->input('mfail');
                 $subject->pfail=$request->input('pfail');

                 $subject->tecode=$tecode;
                 $subject->save();
                 return redirect()->back()->with('success','Subject Registration Successfull');
       }
    }


       public function subjectviewid($id){
           $subject=Subject::find($id);
           return response()->json([
            'status'=>500,
            'subject'=>$subject,
           ]);
       }


       public function subjectupdate(Request $request){

                 $tecode=substr($request->input('class'),0,3).substr($request->input('babu'),0,2).$request->input('subcode');
                 $subject=Subject::find($request->input('edit_id'));
                 $subject->subid=$request->input('subid');
                 $subject->subcode=$request->input('subcode');
                 $subject->class=$request->input('class');
                 $subject->babu=$request->input('babu');
                 $subject->subject=$request->input('subject');
                 $subject->tmark=$request->input('tmark');
                 $subject->cstatus=$request->input('cstatus');
                 $subject->mstatus=$request->input('mstatus');
                 $subject->pstatus=$request->input('pstatus');
                 $subject->cmark=$request->input('cmark');
                 $subject->mmark=$request->input('mmark');
                 $subject->pmark=$request->input('pmark');
                 $subject->cfail=$request->input('cfail');
                 $subject->mfail=$request->input('mfail');
                 $subject->pfail=$request->input('pfail');


                 $subject->tecode=$tecode;
                 $subject->update();
                 return redirect()->back()->with('success','Subject Update Successfull');
       }   
       
       
       public function subjectdelete($id){
             $subject=Subject::find($id);
             $subject->delete();
            return redirect()->back()->with('success','Subject Deleted Successfuly');
       } 
       

       public function subimport(Request $request){
            $eiin = $request->input('eiin');
            $class = $request->input('class');
            $babu = $request->input('babu');
            $count_exist=DB::table('subjects')->where('eiin',adminsession()->eiin)->where('class',$class)
            ->where('babu',$babu)->count('id');
            if($count_exist>=1){
                  return back()->with('fail',$class.'-'.$babu.' Subject already exist');   
            }else{
                $subject=Subject::where('eiin','=',$eiin)->where('class',$class)
                ->where('babu',$babu)->orderBy('subid','asc')->get();
                foreach($subject as $row){ 
                    $subject= new Subject;
                    $subject->eiin=Session::get('admin')->eiin;
                    $subject->subid=$row['subid'];
                    $subject->subcode=$row['subcode'];
                    $subject->class=$row['class'];
                    $subject->babu=$row['babu'];
                    $subject->subject=$row['subject'];
                    $subject->tmark=$row['tmark'];
                    $subject->cstatus=$row['cstatus'];
                    $subject->mstatus=$row['mstatus'];
                    $subject->pstatus=$row['pstatus'];
                    $subject->cmark=$row['cmark'];
                    $subject->mmark=$row['mmark'];
                    $subject->pmark=$row['pmark'];
                    $subject->cfail=$row['cfail'];
                    $subject->mfail=$row['mfail'];
                    $subject->pfail=$row['pfail'];
                    $subject->tecode=$row['tecode'];
                    $subject->save(); 
                }
             return redirect()->back()->with('status','Update Information');   
            }
       }


       public function subexport(Request $request){
       
        $babu=$request->input('babu');
        $class=$request->input('class');
        $eiin=$request->input('eiin');

    
        $codema=$eiin.$class.$babu;
      
         return (new SubjectExport($eiin,$class,$babu))->download($codema.'.csv'); 
        return redirect()->back()->with('success','Data Exported Successfull');  
       //  return $babu;
   }


   public function importexcel(Request $request){

    $eiin = $request->input('eiin');
    $class = $request->input('class');
    $babu = $request->input('babu');
    $count_exist=DB::table('subjects')->where('eiin',adminsession()->eiin)->where('class',$class)
    ->where('babu',$babu)->count('id');
    if($count_exist>=1){
          return back()->with('fail',$class.'-'.$babu.' Subject already exist');   
    }else{
           Excel::Import(new SubjectImport,request()->file('file'));
           return redirect()->back()->with('status', 'Import Successfull');  
          //  return $fileName;
    }
 }


}
