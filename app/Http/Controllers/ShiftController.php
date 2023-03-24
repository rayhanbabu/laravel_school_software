<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\School;
use Illuminate\Http\Request;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class ShiftController extends Controller
{
   
    public function index()
    {
        $admin=adminsession();
        return view('admin.shiftinfo',['admin'=>$admin]);
    }


    public function store(Request $request){

          $admin=adminsession();
          $data= Shift::where('section',$request->input('section'))->where('eiin',$admin->eiin)->count('id');
          if($data>=1){
             return response()->json([
                 'status'=>200,  
                 'message'=>'Section already exist',
             ]);
          }else{
                   $model= new Shift;
                   $model->eiin=$admin->eiin;
                   $model->shift=$request->input('shift');
                   $model->section=$request->input('section');
                   $model->save();
      
             return response()->json([
               'status'=>100,  
               'message'=>'Data Added Successfull',
            ]);
          }
       }


       public function fetchAll(){
        $admin=adminsession();
        $data =Shift::where('eiin',$admin->eiin)->get();
        $output = '';
        if ($data->count()> 0) {
          $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
               <th>Section</th>
               <th>Shift</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
             $output .= '<tr>
               <td>' . $row->section . '</td>
               <td>' . $row->shift .'</td>
           
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
        $data = Shift::find($id);
        return response()->json([
          'status'=>100,  
          'data'=>$data,
        ]);
      }



      public function update(Request $request ){

        $admin=adminsession();
        $model=Shift::find($request->input('edit_id'));
        if($model){
            $model->eiin=$admin->eiin;
            $model->shift=$request->input('shift');
            $model->section=$request->input('section');
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
        $model=Shift::find($request->input('id'));
        $model->delete();
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }



  


}
