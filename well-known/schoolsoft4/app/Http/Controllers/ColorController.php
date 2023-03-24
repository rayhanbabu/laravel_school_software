<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\School;
use App\Models\Subject;
use App\Models\Markinfo;
use DB;
use Session;

class ColorController extends Controller
  {

    function colorview(){
       
        $admin=adminsession();
        $color=Color::where('eiin','=',$admin->eiin)->orderBy('eiin','asc')->get();
        return view('admin.colorview',['color'=>$color,'admin'=>$admin]);
    }


      function colorviewschool(){
           $school=schoolsession();
           $color=Color::where('eiin','=',$school->eiin)->orderBy('eiin','asc')->get();
           return view('school.colorview',['color'=>$color,'school'=>$school]);
       }

    public function colorinsert(Request $request){

        $validated = $request->validate([
            'eiin' => 'required|max:255',
            'eiin' => 'required|unique:colors|max:255',
        ]);
        
                 $color= new Color;
                 $color->eiin=$request->input('eiin');
                 $color->color1=$request->input('color1');
                 $color->color2=$request->input('color2');
                 $color->color3=$request->input('color3');
                 $color->color4=$request->input('color4');
                 $color->color5=$request->input('color5');
                 $color->color6=$request->input('color6');
                 $color->color7=$request->input('color7');
                 $color->color8=$request->input('color8');
                 $color->color9=$request->input('color9');
                 $color->color10=$request->input('color10');
                 $color->color11=$request->input('color11');
                 $color->color12=$request->input('color12');
                 $color->color13=$request->input('color13');
                 $color->color14=$request->input('color14');
                 $color->color21=$request->input('color21');
                 $color->color22=$request->input('color22');
               
                 $color->save();

                 return redirect()->back()->with('success','Color Registration Successfull');
       
    }

    public function colorviewid($id){
        $color=Color::find($id);
        return response()->json([
         'status'=>500,
         'color'=>$color,
        ]);
    }


    public function colorupdate(Request $request){

       
        $color=color::find($request->input('edit_id'));
        $color->color1=$request->input('color1');
        $color->color2=$request->input('color2');
        $color->color3=$request->input('color3');
        $color->color4=$request->input('color4');
        $color->color5=$request->input('color5');
        $color->color6=$request->input('color6');
        $color->color7=$request->input('color7');
        $color->color8=$request->input('color8');
        $color->color9=$request->input('color9');
        $color->color10=$request->input('color10');
        $color->color11=$request->input('color11');
        $color->color12=$request->input('color12');
        $color->color13=$request->input('color13');
        $color->color14=$request->input('color14');
        $color->color21=$request->input('color21');
        $color->color22=$request->input('color22');
        $color->update();
        return redirect()->back()->with('success','Color Update Successfull');
}  

public function colordelete($id){
    $color=Color::find($id);
    $color->delete();
   return redirect()->back()->with('success','Color Deleted Successfuly');
} 

public function colimport(Request $request){
    $eiin = $request->input('eiin');
    $count_exist=DB::table('colors')->where('eiin',adminsession()->eiin)->count('id');
    if($count_exist>=1){
          return back()->with('fail',' Color already exist');   
    }else{
        $color=Color::where('eiin','=',$eiin)->orderBy('eiin','asc')->get();
        if($color){
            foreach($color as $row){ 
                 $color= new Color;
                 $color->eiin=Session::get('admin')->eiin;
                 $color->color1=$row['color1'];
                 $color->color2=$row['color2'];
                 $color->color3=$row['color3'];
                 $color->color4=$row['color4'];
                 $color->color5=$row['color5'];
                 $color->color6=$row['color6'];
                 $color->color7=$row['color7'];
                 $color->color8=$row['color8'];
                 $color->color9=$row['color9'];
                 $color->color10=$row['color10'];
                 $color->color11=$row['color11'];
                 $color->color12=$row['color12'];
                 $color->color13=$row['color13'];
                 $color->color14=$row['color14'];
                 $color->color21=$row['color21'];
                 $color->color22=$row['color22'];
                 $color->save();
             }
             
            }else{
                return back()->with('fail',' This Eiin No  Collor exist');   
            }
          return redirect()->back()->with('status','Update Information');   
       }
    }

         public function subjectview($class,$babu){ 
             $school=schoolsession();
             $subject=Subject::where('eiin','=',$school->eiin)->where('babu',$babu)
            ->where('class',$class)->orderBy('subid','asc')->get();
            return view('school.subjectview',['subject'=>$subject,'school'=>$school,'class'=>$class,'babu'=>$babu]);
         } 

        public function markinfoview($class,$babu){ 
              $school=schoolsession();
              $markinfo=Markinfo::where('eiin','=',$school->eiin)->where('babu',$babu)
              ->where('class',$class)->orderBy('gpa','asc')->get();
            return view('school.marksinfoview',['markinfo'=>$markinfo,'school'=>$school,'class'=>$class,'babu'=>$babu]); 
        }


}
