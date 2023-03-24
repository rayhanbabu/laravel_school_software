<?php

namespace App\Http\Controllers;

use App\Models\Vedio;
use Illuminate\Http\Request;

class VedioController extends Controller
{

    public function vedioindex()
    {

        $data = Vedio::where('category','=','Vedio')->orderBy('serial','ASC')->get();
        return view('school.vedioindex',['data'=>$data]);
    }

    public function index()
    {
        return view('maintain.vedioinfo');
    }


    public function store(Request $request){

         
          $data= Vedio::where('vedio',$request->input('vedio'))->where('category',$request->input('category'))->count('id');
          if($data>=1){
                 return response()->json([
                      'status'=>200,  
                      'message'=>'Section already exist',
                 ]);
           }else{
                   $model= new Vedio;
                   $model->serial=$request->input('serial');
                   $model->category=$request->input('category');
                   $model->vedio=$request->input('vedio');
                   $model->text1=$request->input('text1');
                   $model->text2=$request->input('text2');
                   $model->text3=$request->input('text3');
                   $model->text4=$request->input('text4');
                   $model->save();
    
               return response()->json([
                   'status'=>100,  
                   'message'=>'Data Added Successfull',
              ]);
          }
       }


       public function fetchAll(){
     
        $data = Vedio::get();
        $output = '';
        if ($data->count()> 0) {
          $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
               <th> Category </th>
               <th> Serial </th>
               <th> Text 1 </th>
               <th> Link </th>
               <th> Text 2 </th>
               <th> Text 3 </th>
              <th> Text 4</th>
               <th> Action </th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
              $output .= '<tr>
                   <td>' . $row->category . '</td>
                   <td>' . $row->serial .'</td>
                   <td>' . $row->text1 .'</td>
                   <td>' . $row->vedio .'</td>
                  <td>' . $row->text2 .'</td>
                  <td>' . $row->text3 .'</td>
                  <td>' . $row->text4 .'</td>
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
        $data = Vedio::find($id);
        return response()->json([
          'status'=>100,  
          'data'=>$data,
        ]);
      }



      public function update(Request $request ){

      
        $model=Vedio::find($request->input('edit_id'));
        if($model){
            $model->serial=$request->input('serial');
            $model->category=$request->input('category');
            $model->vedio=$request->input('vedio');
            $model->text1=$request->input('text1');
            $model->text2=$request->input('text2');
            $model->text3=$request->input('text3');
            $model->text4=$request->input('text4');
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
        $model=Vedio::find($request->input('id'));
        $model->delete();
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }



          public function list($category){
                   $data = Vedio::where('category',$category)->orderBy('serial','ASC')->get();
                    return response()->json([
                     'status'=>200,  
                     'data'=>$data,
              ]);
              
          }


}
