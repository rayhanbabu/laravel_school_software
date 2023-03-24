<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Exam;
use App\Models\Examinfo;
use Illuminate\Http\Request;
use DB;
use Hash;
use Mail;
use Session;
use PDF;

class ExaminfoController extends Controller
{
   
 
        public function index()
        {
            $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
            $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
            $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
            $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
            $admin=School::where('eiin','=',adminsession()->eiin)->first();
            $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
            return view('admin.examinfo',['admin'=>$admin,'subject'=>$subject,'class'=>$class,'group'=>$group,'exam'=>$exam,'year'=>$year]);
        }
    
    

        public function store(Request $request){

              $admin=adminsession();
              $data= Examinfo::where('babu',$request->input('babu'))->where('class',$request->input('class'))
              ->where('eiin',$admin->eiin)->count('id');
              if($data>=1){
                 return response()->json([
                     'status'=>200,  
                     'message'=>'Class & Group already exist',
                 ]);
              }else{

                       $model= new Examinfo;
                       $model->eiin=$admin->eiin;
                       $model->section=$admin->admin_section;
                       $model->class=$request->input('class');
                       $model->babu=$request->input('babu');
                       $model->exam=$request->input('exam');
                       $model->year=$request->input('year');
                       $model->save();
          
                 return response()->json([
                   'status'=>100,  
                   'message'=>'Data Added Successfull',
                ]);
              }
           }
      
      
       
      public function fetchAll(){
            $admin=adminsession();
            $data = Examinfo::where('eiin',$admin->eiin)->get();
            $output = '';
            if ($data->count()> 0) {
              $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
               $output .= '<table class="table table-bordered table-sm text-start align-middle">
               <thead>
                 <tr>
                   <th>Class</th>
                   <th>Group</th>
                   <th>Exam</th>
                   <th>Year 1</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>';
               foreach ($data as $row) {
                 $output .= '<tr>
                   <td>' . $row->class . '</td>
                   <td>' . $row->babu .'</td>
                   <td>' .  examName($row->exam). '</td>
                   <td>' . $row->year . '</td>
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
            $data = Examinfo::find($id);
            return response()->json([
              'status'=>100,  
              'data'=>$data,
            ]);
          }


          public function update(Request $request ){

            $admin=adminsession();
          
            $model=Examinfo::find($request->input('edit_id'));
            if($model){
                $model->eiin=$admin->eiin;
                $model->section=$admin->admin_section;
                $model->class=$request->input('class');
                $model->babu=$request->input('babu');
                $model->exam=$request->input('exam');
                $model->year=$request->input('year');
            
                $model->update();   

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
            $model=Examinfo::find($request->input('id'));
            $model->delete();
            return response()->json([
               'status'=>200,  
               'message'=>'Deleted Data',
             ]);
          }

    


}
