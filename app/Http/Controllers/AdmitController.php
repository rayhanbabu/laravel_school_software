<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Exam;
use App\Models\Admit;
use App\Models\Student;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Collection;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class AdmitController extends Controller
{
  
    public function admitindex() {
        $school=schoolsession(); 
        $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
        $classrow=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $grouprow=Exam::where('babu','group')->orderBy('serial','asc')->get();
         return view('school.admitindex',['school'=>$school,'subject'=>$subject,'classrow'=>$classrow,'grouprow'=>$grouprow ]);
     }


     public function store(Request $request){

        $school=schoolsession(); 
        $data= Admit::where('babu',$request->input('babu'))->where('class',$request->input('class'))
        ->where('section',Session::get('section'))->where('eiin',$school->eiin)->count('id');
        if($data>=1){
           return response()->json([
               'status'=>200,  
               'message'=>'Class & Group already exist',
           ]);
        }else{
                 $admit= new Admit;
                 $admit->eiin=$school->eiin;
                 $admit->section=Session::get('section');
                 $admit->class=$request->input('class');
                 $admit->babu=$request->input('babu');
                 $admit->time=$request->input('time');

                 $admit->sub1=$request->input('sub1');
                 $admit->sub2=$request->input('sub2');
                 $admit->sub3=$request->input('sub3');
                 $admit->sub4=$request->input('sub4');
                 $admit->sub5=$request->input('sub5');
                 $admit->sub6=$request->input('sub6');
                 $admit->sub7=$request->input('sub7');
                 $admit->sub8=$request->input('sub8');
                 $admit->sub9=$request->input('sub9');
                 $admit->sub10=$request->input('sub10');
                 $admit->sub11=$request->input('sub11');
                 $admit->sub12=$request->input('sub12');
                 $admit->sub13=$request->input('sub13');
                 $admit->sub14=$request->input('sub14');
                 $admit->sub15=$request->input('sub15');
                 $admit->sub16=$request->input('sub16');
                 $admit->sub17=$request->input('sub17');
                 $admit->sub18=$request->input('sub18');

                 $admit->time1=substr($request->input('time1'),0,15);
                 $admit->time2=substr($request->input('time2'),0,15);
                 $admit->time3=substr($request->input('time3'),0,15);
                 $admit->time4=substr($request->input('time4'),0,15);
                 $admit->time5=substr($request->input('time5'),0,15);
                 $admit->time6=substr($request->input('time6'),0,15);
                 $admit->time7=substr($request->input('time7'),0,15);
                 $admit->time8=substr($request->input('time8'),0,15);
                 $admit->time9=substr($request->input('time9'),0,15);
                 $admit->time10=substr($request->input('time10'),0,15);
                 $admit->time11=substr($request->input('time11'),0,15);
                 $admit->time12=substr($request->input('time12'),0,15);
                 $admit->time13=substr($request->input('time13'),0,15);
                 $admit->time14=substr($request->input('time14'),0,15);
                 $admit->time15=substr($request->input('time15'),0,15);
                 $admit->time16=substr($request->input('time16'),0,15);
                 $admit->time17=substr($request->input('time17'),0,15);
                 $admit->time18=substr($request->input('time18'),0,15);

                 $admit->date1=$request->input('date1');
                 $admit->date2=$request->input('date2');
                 $admit->date3=$request->input('date3');
                 $admit->date4=$request->input('date4');
                 $admit->date5=$request->input('date5');
                 $admit->date6=$request->input('date6');
                 $admit->date7=$request->input('date7');
                 $admit->date8=$request->input('date8');
                 $admit->date9=$request->input('date9');
                 $admit->date10=$request->input('date10');
                 $admit->date11=$request->input('date11');
                 $admit->date12=$request->input('date12');
                 $admit->date13=$request->input('date13');
                 $admit->date14=$request->input('date14');
                 $admit->date15=$request->input('date15');
                 $admit->date16=$request->input('date16');
                 $admit->date17=$request->input('date17');
                 $admit->date18=$request->input('date18');
                 $admit->save();
    
           return response()->json([
             'status'=>100,  
             'message'=>'Data Added Successfull',
          ]);
         
    
        }
       }





     public function fetchAll() {
        $school=schoolsession(); 
        $data =Admit::where('section',Session::get('section'))->where('eiin',$school->eiin)->get();
        $output = '';
        if ($data->count()> 0) {
          $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
               <th>Class</th>
               <th>Group</th>
               <th>Section</th>
               <th>Date 1</th>
               <th>Subject 1 Code</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
             $output .= '<tr>
               <td>' . $row->class . '</td>
               <td>' . $row->babu .'</td>
               <td>' . $row->section. '</td>
               <td>' . $row->date1.', ' .$row->time1. '</td>
               <td>' . $row->sub1 . '</td>
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
        $data = Admit::find($id);
        return response()->json([
          'status'=>100,  
          'data'=>$data,
        ]);
      }


      public function update(Request $request ){

        $school=schoolsession(); 
        $admit=Admit::find($request->input('edit_id'));
        if($admit){
          $admit->eiin=$school->eiin;
          $admit->class=$request->input('class');
          $admit->babu=$request->input('babu');
          $admit->time=$request->input('time');

          $admit->sub1=$request->input('sub1');
          $admit->sub2=$request->input('sub2');
          $admit->sub3=$request->input('sub3');
          $admit->sub4=$request->input('sub4');
          $admit->sub5=$request->input('sub5');
          $admit->sub6=$request->input('sub6');
          $admit->sub7=$request->input('sub7');
          $admit->sub8=$request->input('sub8');
          $admit->sub9=$request->input('sub9');
          $admit->sub10=$request->input('sub10');
          $admit->sub11=$request->input('sub11');
          $admit->sub12=$request->input('sub12');
          $admit->sub13=$request->input('sub13');
          $admit->sub14=$request->input('sub14');
          $admit->sub15=$request->input('sub15');
          $admit->sub16=$request->input('sub16');
          $admit->sub17=$request->input('sub17');
          $admit->sub18=$request->input('sub18');


          $admit->time1=substr($request->input('time1'),0,15);
          $admit->time2=substr($request->input('time2'),0,15);
          $admit->time3=substr($request->input('time3'),0,15);
          $admit->time4=substr($request->input('time4'),0,15);
          $admit->time5=substr($request->input('time5'),0,15);
          $admit->time6=substr($request->input('time6'),0,15);
          $admit->time7=substr($request->input('time7'),0,15);
          $admit->time8=substr($request->input('time8'),0,15);
          $admit->time9=substr($request->input('time9'),0,15);
          $admit->time10=substr($request->input('time10'),0,15);
          $admit->time11=substr($request->input('time11'),0,15);
          $admit->time12=substr($request->input('time12'),0,15);
          $admit->time13=substr($request->input('time13'),0,15);
          $admit->time14=substr($request->input('time14'),0,15);
          $admit->time15=substr($request->input('time15'),0,15);
          $admit->time16=substr($request->input('time16'),0,15);
          $admit->time17=substr($request->input('time17'),0,15);
          $admit->time18=substr($request->input('time18'),0,15);
          

          $admit->date1=$request->input('date1');
          $admit->date2=$request->input('date2');
          $admit->date3=$request->input('date3');
          $admit->date4=$request->input('date4');
          $admit->date5=$request->input('date5');
          $admit->date6=$request->input('date6');
          $admit->date7=$request->input('date7');
          $admit->date8=$request->input('date8');
          $admit->date9=$request->input('date9');
          $admit->date10=$request->input('date10');
          $admit->date11=$request->input('date11');
          $admit->date12=$request->input('date12');
          $admit->date13=$request->input('date13');
          $admit->date14=$request->input('date14');
          $admit->date15=$request->input('date15');
          $admit->date16=$request->input('date16');
          $admit->date17=$request->input('date17');
          $admit->date18=$request->input('date18');
          
          $admit->update();   
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
        $admit=Admit::find($request->input('id'));
        $admit->delete();
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }


    


}
