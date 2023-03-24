<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Exam;
use App\Models\Admit;
use App\Models\Routine;
use App\Models\Teacher;
use App\Models\Color;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class RoutineController extends Controller
{
    public function routineindex() {
        $school=schoolsession(); 
        $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
        $class=Exam::where('babu','class')->orderBy('id','asc')->get();
        $babu=Exam::where('babu','group')->orderBy('id','asc')->get();
        $teacher=Teacher::where('eiin',$school->eiin)->orderBy('name','asc')->get();
         return view('school.routineindex',['school'=>$school,'subject'=>$subject,'teacher'=>$teacher
         ,'class'=>$class,'babu'=>$babu]);
     }


    public function store(Request $request){

     $school=schoolsession(); 
     $data= Routine::where('babu',$request->input('babu'))->where('class',$request->input('class'))
    ->where('section',Session::get('section'))->where('eiin',$school->eiin)->where('day',$request->input('day'))->count('id');
        if($data>=1){
          return response()->json([
              'status'=>200,  
              'message'=>' Class, Group & Day already Exist',
          ]);
        }else{
                  $routine= new Routine;
                  $routine->eiin=$school->eiin;
                  $routine->section=Session::get('section');
                  $routine->class=$request->input('class');
                  $routine->babu=$request->input('babu');
                  $routine->day=$request->input('day');

                  $routine->sub1=$request->input('sub1');
                  $routine->sub2=$request->input('sub2');
                  $routine->sub3=$request->input('sub3');
                  $routine->sub4=$request->input('sub4');
                  $routine->sub5=$request->input('sub5');
                  $routine->sub6=$request->input('sub6');
                  $routine->sub7=$request->input('sub7');
                  $routine->sub8=$request->input('sub8');
                

                 $routine->date1=$request->input('date1');
                 $routine->date2=$request->input('date2');
                 $routine->date3=$request->input('date3');
                 $routine->date4=$request->input('date4');
                 $routine->date5=$request->input('date5');
                 $routine->date6=$request->input('date6');
                 $routine->date7=$request->input('date7');
                 $routine->date8=$request->input('date8');

                 $routine->tea1=$request->input('tea1');
                 $routine->tea2=$request->input('tea2');
                 $routine->tea3=$request->input('tea3');
                 $routine->tea4=$request->input('tea4');
                 $routine->tea5=$request->input('tea5');
                 $routine->tea6=$request->input('tea6');
                 $routine->tea7=$request->input('tea7');
                 $routine->tea8=$request->input('tea8');
                
                 $routine->save();
    
           return response()->json([
            'status'=>100,  
            'message'=>'Data Added Successfull',
          ]);
        
        }
       }



       public function fetchAll() {
        $school=schoolsession(); 
        $data = Routine::where('section',Session::get('section'))->where('eiin',$school->eiin)->get();
        $output = '';
        if ($data->count()> 0) {
          $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
               <th>Class</th>
               <th>Group</th>
               <th>Section</th>
               <th>Day</th>
               <th>Time(Form-To) 1</th>
               <th>Subject 1 code</th>
               <th>Teacher 1 Code</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
             $output .= '<tr>
               <td>' . $row->class . '</td>
               <td>' . $row->babu .'</td>
               <td>' . $row->section. '</td>
               <td>' . $row->day. '</td>
               <td>' . $row->date1 . '</td>
               <td>' . $row->sub1 . '</td>
               <td>' . $row->tea1 . '</td>
               <td>
               <a href="#" id="' . $row->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i>Edit/View</a>

               <a href="#" id="' .$row->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i>Delete</a>
              </td>
            </tr>';
         }
           $output .= '</tbody></table>';
           echo $output;
        } else {
           echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }  


    public function edit(Request $request) {
        $id = $request->id;
        $data = Routine::find($id);
        return response()->json([
          'status'=>100,  
          'data'=>$data,
        ]);
      }


      public function update(Request $request ){

        $school=schoolsession(); 
        $routine=Routine::find($request->input('edit_id'));
        if($routine){
         
            $routine->class=$request->input('class');
            $routine->babu=$request->input('babu');
            $routine->day=$request->input('day');

            $routine->sub1=$request->input('sub1');
            $routine->sub2=$request->input('sub2');
            $routine->sub3=$request->input('sub3');
            $routine->sub4=$request->input('sub4');
            $routine->sub5=$request->input('sub5');
            $routine->sub6=$request->input('sub6');
            $routine->sub7=$request->input('sub7');
            $routine->sub8=$request->input('sub8');
           

            $routine->date1=$request->input('date1');
            $routine->date2=$request->input('date2');
            $routine->date3=$request->input('date3');
            $routine->date4=$request->input('date4');
            $routine->date5=$request->input('date5');
            $routine->date6=$request->input('date6');
            $routine->date7=$request->input('date7');
            $routine->date8=$request->input('date8');

            $routine->tea1=$request->input('tea1');
            $routine->tea2=$request->input('tea2');
            $routine->tea3=$request->input('tea3');
            $routine->tea4=$request->input('tea4');
            $routine->tea5=$request->input('tea5');
            $routine->tea6=$request->input('tea6');
            $routine->tea7=$request->input('tea7');
            $routine->tea8=$request->input('tea8');

          
          $routine->update();   
            return response()->json([
                'status'=>100,
                'message'=>'Data Updated Successfull'
            ]);
        }else{
            return response()->json([
                'status'=>404,  
                'message'=>'Student not found',
              ]);
        }
      }


      public function delete(Request $request) {
        $routine=Routine::find($request->input('id'));
        $routine->delete();
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }




      public function routine(Request $request){
        $school=schoolsession(); 
        $class=$request->input('class');
        $babu=$request->input('babu');
    
        $admit = Routine::where('babu',$babu)->where('class',$class)->where('section',Session::get('section'))
        ->where('eiin',$school->eiin)->get();
       
    
        $color = Color::where('eiin',$school->eiin)->first();
    
        $file='Admit-'.$class.'-'.$babu.'-'.$school->section.'.pdf';
    
       $data = [
          'title' => 'Welcome to OnlineWebTutorBlog.com',
          'class'=>$class,
          'babu'=>$babu,
          'section'=>Session::get('section'),
          'color' => $color,
          'admit' => $admit,
         
    ];
          
        $pdf=PDF::setPaper('a4', 'landscape')->loadView('pdf.routine',$data);
         //return $pdf->download($file);
         return  $pdf->stream($file,array('Attachment'=>false)); 
    
         //return $admit;
     }
    



}
