<?php

namespace App\Http\Controllers;

use App\Models\Exstudent;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\Invoice;
use App\Models\Mark;
use App\Models\Exam;
use App\Models\Examinfo;
use App\Models\Paymentinfo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Collection;
use DB;
use Hash;
use Mail;
use Session;
use PDF;


class ExstudentController extends Controller
{
  
    public function exstudent()
      {
        $school=schoolsession();
        $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
        $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
        $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
        return view('school.exstudent',['school'=>$school,'year'=>$year,'class'=>$class,'group'=>$group]);
     }

     public function store(Request $request){
          
      $school=schoolsession();
      $data= Exstudent::where('roll',$request->input('roll'))->where('babu',$request->input('babu'))
      ->where('class',$request->input('class'))->where('section',$request->input('section'))
      ->where('year',$request->input('year'))->where('eiin',$school->eiin)->count('id');
      if($data>=1){
        return response()->json([
            'status'=>200,  
            'message'=>'Roll number already exist',
        ]);
      }else{
          $max=Exstudent::max('id');
          $prefix=5000000;
          $stu_id= $prefix+$max;

      if($request->hasfile('image') && $school->text1=='Yes'){

          $imgfile=$request->input('class').$request->input('babu').$school->section.$request->input('roll').'-';
          $size = $request->file('image')->getsize(); 
          $file=$_FILES['image']['tmp_name'];
          $hw=getimagesize($file);
          $w=$hw[0];
          $h=$hw[1];	 
             if($size<512000){
              if($w<310 && $h<310){
               $image= $request->file('image'); 
               $new_name = $imgfile.rand() . '.' . $image->getClientOriginalExtension();
               $image->move('uploads/student', $new_name);

               $student= new Exstudent;
               $student->stu_id=$stu_id;
               $student->eiin=$school->eiin;
               $student->year=$request->input('year');
               $student->section=$request->input('section');
               $student->class=$request->input('class');
               $student->babu=$request->input('babu');
               $student->main=$request->input('main');
               $student->addi=$request->input('addi');

               $student->roll=$request->input('roll');
               $student->name=$request->input('name');
               $student->moral=$request->input('moral');
               $student->phone=$request->input('phone');
               $student->father=$request->input('father');
               $student->mother=$request->input('mother');
               $student->address=$request->input('address');
               $student->birth_date=$request->input('birth_date');
               $student->image=$new_name;
               $student->save();

               $uid=$student->id;

               return response()->json([
                'status'=>100,  
                'message'=>'Data Added Successfull',
              ]);
  
            }else{
              return response()->json([
                  'status'=>300,  
                 'message'=>'Image size must be 300*300px',
               ]);
              }
           }else{
               return response()->json([
               'status'=>400,  
               'message'=>'Image Size geather than 500KB',
             ]);
           }
       }
        else{
               $student= new Exstudent;
               $student->stu_id=$stu_id;
               $student->eiin=$school->eiin;
               $student->year=$request->input('year');
               $student->section=$request->input('section');
               $student->class=$request->input('class');
               $student->babu=$request->input('babu');
               $student->main=$request->input('main');
               $student->addi=$request->input('addi');

               $student->roll=$request->input('roll');
               $student->name=$request->input('name');
               $student->moral=$request->input('moral');
               $student->phone=$request->input('phone');
               $student->father=$request->input('father');
               $student->mother=$request->input('mother');
               $student->address=$request->input('address');
               $student->birth_date=($request->input('birth_date'));
               $student->save();

  
           return response()->json([
             'status'=>100,  
             'message'=>'Data Added Successfull',
            ]);
         }
  
      }     
   }


     public function fetchAll() {
        $school=schoolsession();
        $data = Exstudent::where('eiin',$school->eiin)->get();
        $output = '';
        if ($data->count()> 0) {
          $output.=' <h5 class="text-success"> Total Students : '.$data->count().' </h5>';	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
               <th>Image</th>
               <th>Stu. ID</th>
               <th>Roll</th>
               <th>Name</th>
               <th>Section</th>
               <th>Class</th>
               <th>Group</th>
               <th>Year</th>
               <th>Phone(880)</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {

             if(!$row->image){$image="";}else{$image='<i class="fa fa-download"></i>';}
             $output .= '<tr>
             <td>
            <a href=/uploads/student/'.$row->image.' download id="' . $row->id . '" class="text-success mx-1">'.$image.' </a>
             </td>
               <td>' . $row->stu_id .'</td>
               <td>' . $row->roll .'</td>
               <td>' . $row->name. '</td>
               <td>' . $row->section . '</td>
               <td>' . $row->class . '</td>
               <td>' . $row->babu . '</td>
               <td>' . $row->year . '</td>
               <td>' . $row->phone . '</td>
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
         $data = Exstudent::find($id);
          return response()->json([
             'status'=>100,  
             'data'=>$data,
          ]);
       }


       public function update(Request $request ){

        $school=schoolsession();
        $student=Exstudent::find($request->input('edit_id'));
        if($student){
          $student->eiin=$school->eiin;
          $student->year=$request->input('year');
          $student->section=$request->input('section');
          $student->class=$request->input('class');
          $student->babu=$request->input('babu');
          $student->main=$request->input('main');
          $student->addi=$request->input('addi');

          $student->roll=$request->input('roll');
          $student->name=$request->input('name');
          $student->moral=$request->input('moral');
          $student->phone=$request->input('phone');
          $student->father=$request->input('father');
          $student->mother=$request->input('mother');
          $student->address=$request->input('address');
          $student->birth_date=$request->input('birth_date');

          $student->syear=$request->input('syear');
          $student->sexam=$request->input('sexam');
          $student->sgp=$request->input('sgp');
          $student->sg=$request->input('sg');
          $student->sroll=$request->input('sroll');
          $student->sreg=$request->input('sreg');
          $student->sboard=$request->input('sboard');

           if($request->hasfile('image') && $school->text1=='Yes'){

            $imgfile=$request->input('class').$request->input('babu').$request->input('babu').$request->input('roll').'-';
             $size = $request->file('image')->getsize(); 
             $file=$_FILES['image']['tmp_name'];
             $hw=getimagesize($file);
             $w=$hw[0];
             $h=$hw[1];	 
                   if($size<512000){
                  if($w<310 && $h<310){
                   $path='uploads/student/'.$student->image;
                   if(File::exists($path)){
                    File::delete($path);
                    }
                   $image = $request->file('image');
                   $new_name = $imgfile.rand() . '.' . $image->getClientOriginalExtension();
                   $image->move('uploads/student/', $new_name);
                   $student->image=$new_name;

                  }else{
                    return response()->json([
                        'status'=>200,  
                       'message'=>'Image size must be 300*300px',
                     ]);
                    }

                   } 
                   else{
                   return response()->json([
                      'status'=>300,  
                      'message'=>'Image Size geather than 500KB',
                    ]);
                   } 
                  }  
                  $student->update();   
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
        $student=Exstudent::find($request->input('id'));
         $path='uploads/student/'.$student->image;
             if(File::exists($path)){
                 File::delete($path);
             }
         $delete=$student->delete();
       
     
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }


    
}
