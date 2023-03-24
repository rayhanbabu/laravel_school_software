<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Subject;
use App\Models\Exam;
use DB;
use Hash;
use Mail;
use Session;
use PDF;



class CalculationController extends Controller
{
   
     public function index()
          {
              $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
              $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
              $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
              return view('admin.calculationinfo',['admin'=>$admin,'class'=>$class,'group'=>$group]);
          }


          public function store(Request $request){

              $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
      
              $data= Calculation::where('babu',$request->input('babu'))->where('class',$request->input('class'))
              ->where('eiin',$admin->eiin)->count('id');
              if($data>=1){
                 return response()->json([
                     'status'=>200,  
                     'message'=>'Class & Group already exist',
                 ]);
              }else{

                       $model= new Calculation;
                       $model->eiin=$admin->eiin;
                       $model->class=$request->input('class');
                       $model->babu=$request->input('babu');
                       $model->save();
          
                 return response()->json([
                   'status'=>100,  
                   'message'=>'Data Added Successfull',
                ]);
              }
           }
      


  
          public function fetchAll(){
            $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
            $data = Calculation::where('eiin',$admin->eiin)->get();
            $output = '';
            if ($data->count()> 0){
              $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
               $output .= '<table class="table table-bordered table-sm text-start align-middle">
               <thead>
                 <tr>
                      <th>Class</th>
                      <th>Group</th>
                      <th>Subject Name</th>
                      <th>Total Subject</th>
                      <th>Action</th>
                 </tr>
               </thead>
               <tbody>';
               foreach ($data as $row) {
                $tags=explode(',',$row->subcode);
                $totalsub=(count($tags)-1);
                 $output .= '<tr>
                   <td>' .$row->class. '</td>
                   <td>' .$row->babu.'</td>
                   <td>' .funsuncode($row->class,$row->babu,$row->subcode,$admin->eiin).'</td>
                   <td>' .$totalsub.'</td>
                   <td>
                   <a href="/calculation/edit/'.$row->class.'/'.$row->babu.'/'.$row->id.'"  class="text-success mx-1">Edit/View</a>

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
        
        
        public function edit(Request $request,$class,$babu,$id) {
             $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
             $subject=Subject::where('babu',$babu)->where('class',$class)->where('eiin',$admin->eiin)->orderBy('subcode','asc')->get();
             $cal=Calculation::where('babu',$babu)->where('class',$class)->where('eiin',$admin->eiin)->first();
             $data=explode(',',$cal->subcode);	
             return view('admin.calculationedit',['admin'=>$admin,'subject'=>$subject,'id'=>$id,
             'subcode'=>$data ,'class'=>$class, 'babu'=>$babu]);
          }


          public function update(Request $request ){
            $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
                    $subcode_insert='';
            foreach($request->input('subcode') as $value) {
                    $subcode_insert.= $value.",";
               }
           
               $post=$request->all();
          
               $cal=Calculation::find($request->input('edit_id'));
               if($cal){
                    $cal->subcode=$subcode_insert;
                    $cal->update();   
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
            $model=Calculation::find($request->input('id'));
            $model->delete();
            return response()->json([
               'status'=>200,  
               'message'=>'Deleted Data',
             ]);
          }
  
            

          public function des(){
                  $subject=Calculation::where('babu','NA')->where('class','Six')->first();
                    $subcode1=$subject->subcode;                    
                   

                    //   foreach($tags as $i =>$key){                   
                     //         echo $i.' '.$key .'</br>';  
                     //   }

                       
                       $sub11=111;
                       $sub12=112;
                       $sub13=113;
                       $sub14=114;
                       $sub15=115;                                        
                       $gpa=4.75;

                    
                        function matchgpa($subcode,$subid,$gpa){
                               $tags=explode(',',$subid);
                                 for($x=0;$x<count($tags)-1;$x++){
                                    if($subcode==$tags[$x]){
                                         $yes='Yes';
                                      }
                                  }                             
                                    return  empty($yes)?0:$gpa;   
                         }

                       return matchgpa($sub15,$subcode1,$gpa);
                        
                  
                         //echo $sub11t;
                        //echo count($tags);
                    
                     //print_r(count(explode(',',$subcode1,8)));
                     // return $data1;
             }



       
}
