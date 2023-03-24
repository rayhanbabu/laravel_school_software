<?php

namespace App\Http\Controllers;

use App\Models\Spend;
use App\Models\School;
use Illuminate\Http\Request;
use DB;
use Hash;
use Mail;
use Session;
use PDF;

class SpendController extends Controller
{
   
    public function spendindex()
    {
      if(Session::has('school')){ 
        $school=schoolsession();  
       }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
        $school=teachersession();  
       }else{
          return redirect()->back();
       }


            return view('school.spend',['school'=>$school]);
    }

   
      public function store(Request $request){

        if(Session::has('school')){ 
             $school=schoolsession();   
        }elseif(Session::has('teacher')){
             $school=teachersession();  
        }
          if($school->spend_access=='Yes'){

                 $model= new Spend;
                 $model->eiin=$school->eiin;
                 $model->date=$request->input('date');
                 $model->day=date('d',strtotime($request->input('date')));
                 $model->month=date('m',strtotime($request->input('date')));
                 $model->year=date('Y',strtotime($request->input('date')));
                 $model->description=$request->input('description');
                 $model->qty=$request->input('qty');
                 $model->unit=$request->input('unit');
                 $model->price=$request->input('price');
                 $model->total=$request->input('price')*$request->input('qty');
                 $model->save();
    
             return response()->json([
               'status'=>100,  
                'message'=>'Data Added Successfull',
             ]);

            }else{
              return response()->json([
                'status'=>200,  
                 'message'=>'No Access.Please Contact Head office',
              ]);
            }
       }



       public function fetchAll(){
        if(Session::has('school')){ 
            $school=schoolsession();   
        }elseif(Session::has('teacher')){
            $school=teachersession(); 
        }
        $data = Spend::where('eiin',$school->eiin)->get();
        $output = '';
        if ($data->count()> 0) {	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th> per Amount </th>
                <th> Total amount </th>
                <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
             $output .= '<tr>
               <td>'. $row->date .'</td>
               <td>'. $row->description.'</td>
               <td>'. $row->qty.'</td>
               <td>'. $row->unit.'</td>
               <td>'. $row->price.'</td>
               <td>'. $row->total.'</td>

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
        $data = Spend::find($id);
           return response()->json([
             'status'=>100,  
             'data'=>$data,
           ]);
      }


      public function update(Request $request){

        if(Session::has('school')){ 
            $school=schoolsession();  
        }elseif(Session::has('teacher')){
           $school=teachersession();   
        }
        $model=Spend::find($request->input('edit_id'));
        if($model){
            $model->eiin=$school->eiin;
            $model->date=$request->input('date');
            $model->day=date('d',strtotime($request->input('date')));
            $model->month=date('m',strtotime($request->input('date')));
            $model->year=date('Y',strtotime($request->input('date')));
            $model->description=$request->input('description');
            $model->qty=$request->input('qty');
            $model->unit=$request->input('unit');
            $model->price=$request->input('price');
            $model->total=$request->input('price')*$request->input('qty');
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
        $model=Spend::find($request->input('id'));
        $model->delete();
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }






}
