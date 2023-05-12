<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\Invoice;
use App\Models\Mark;
use App\Models\Exam;
use App\Models\Atten;
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


class StudentController extends Controller
{
    
     public function student($class,$babu){
          $school=schoolsession();
          return view('school.studentindex',['school'=>$school,'class'=>$class,'babu'=>$babu]);
     }

   

    public function store(Request $request){

        $school=schoolsession();
        $data= Student::where('roll',$request->input('roll'))->where('babu',$request->input('babu'))
         ->where('class',$request->input('class'))->where('section',Session::get('section'))
         ->where('eiin',$school->eiin)->count('id');
        if($data>=1){
          return response()->json([
              'status'=>200,  
              'message'=>'Roll number already exist',
          ]);
        }else{
            $max=Student::max('id');
            $prefix=5000000;
            $stu_id= $prefix+$max;

        if($request->hasfile('image') && $school->image_access=='Yes'){
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

                 $student= new Student;
                 $student->stu_id=$stu_id;
                 $student->eiin=$school->eiin;
                 $student->section=Session::get('section');
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
                 $student= new Student;
                 $student->stu_id=$stu_id;
                 $student->eiin=$school->eiin;
                 $student->section=Session::get('section');
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
        
         }

         if($student->id!=""){
          $examinfo=Examinfo::where('eiin',schoolsession()->eiin)->where('babu',$request->input('babu'))
          ->where('class',$request->input('class'))->first();

          $mark= new Mark;
          $mark->uid=$student->id;
          $mark->student_id=$student->stu_id;
          $mark->eiin=$school->eiin;
          $mark->roll=$request->input('roll');
          $mark->name=$request->input('name');
          $mark->section=Session::get('section');
          $mark->class=$request->input('class');
          $mark->babu=$request->input('babu');
          $mark->year=$examinfo->year;
          $mark->exam=$examinfo->exam;
          $mark->sub16sn=$request->input('moral');
          $mark->sub16n=fullsubname($request->input('moral'));
          $mark->sub23sn=$request->input('main');
          $mark->sub23n=fullsubname($request->input('main'));
          $mark->sub24sn=$request->input('addi');
          $mark->sub24n=fullsubname($request->input('addi'));
          $mark->save();

         if($school->fin_access=='Yes'){

          $payment=Paymentinfo::where('eiin',schoolsession()->eiin)->where('babu',$request->input('babu'))
          ->where('class',$request->input('class'))->where('section',Session::get('section'))->first();
   
             $invoice= new Invoice;
             $invoice->uid=$student->id;
             $invoice->student_id=$stu->id;
             $invoice->eiin=$school->eiin;
             $invoice->roll=$request->input('roll');
             $invoice->name=$request->input('name');
             $invoice->section=Session::get('section');
             $invoice->class=$request->input('class');
             $invoice->babu=$request->input('babu');
             $invoice->invoice_date=$payment->date;
             $invoice->invoice_month=date('n',strtotime($payment->date));
             $invoice->invoice_year=date('Y',strtotime($payment->date));
             $invoice->des1=$payment->des1;
             $invoice->amount1=$payment->amount1;
             $invoice->des2=$payment->des2;
             $invoice->amount2=$payment->amount2;
             $invoice->des3=$payment->des3;
             $invoice->amount3=$payment->amount3;
             $invoice->des4=$payment->des4;
             $invoice->amount4=$payment->amount4;
             $invoice->des5=$payment->des5;
             $invoice->amount5=$payment->amount5;
             $invoice->des6=$payment->des6;
             $invoice->amount6=$payment->amount6;
             $invoice->status=0;
             $invoice->totalamount=$payment->amount6+$payment->amount5+$payment->amount4
                          +$payment->amount4+$payment->amount3+$payment->amount2+$payment->amount1;
             $invoice->cur_monthpayment=$payment->amount6+$payment->amount5+$payment->amount4
                          +$payment->amount4+$payment->amount3+$payment->amount2+$payment->amount1;              
   
             $invoice->save();

         }

          return response()->json([
            'status'=>100,  
            'message'=>'Data Added Successfull',
          ]);

         }

    
        }
       }


       public function fetchAll($class,$babu) {
        $school=schoolsession();
        $data = Student::where('babu',$babu)->where('class',$class)->where('section',Session::get('section'))
        ->where('eiin',$school->eiin)->get();
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
               <th>Moral</th>
               <th>Main</th>
               <th>Addinonal</th>
               <th>Phone(88)</th>
               <th>View</th>
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
               <td>' . $row->stu_id . '</td>
               <td>' . $row->roll .'</td>
               <td>' . $row->name. '</td>
               <td>' . $row->section . '</td>
               <td>' . fullsubname($row->moral) . '</td>
               <td>' . fullsubname($row->main) . '</td>
               <td>' . fullsubname($row->addi) . '</td>
               <td>' . $row->phone . '</td>
               <td>
               <button type="button" name="view" id="'.$row->id .'" class="border-0 btn btn-success btn-sm view" ><i class="fas fa-eye"></i></button>
               </td>
               <td>
               <a href="#" id="' . $row->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i>Edit</a>

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
        $data = Student::find($id);
        return response()->json([
          'status'=>100,  
          'data'=>$data,
        ]);
      }
    


      public function update(Request $request ){

        $school=schoolsession();
        $student=Student::find($request->input('edit_id'));
        if($student){
          $student->eiin=$school->eiin;
          $student->section=Session::get('section');
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
          
          
          
            $moralshort=$request->input('moral');
            $moralfull=fullsubname($moralshort);
            $mainshort=$request->input('main');
            $mainfull=fullsubname($mainshort);
            $addishort=$request->input('addi');
            $addifull=fullsubname($addishort);
            $uid=$request->input('edit_id');
            
            $roll=$request->input('roll');
            $name=$request->input('name');

            DB::update(
                    "update marks set sub16n ='$moralfull', sub16sn ='$moralshort' ,
                               sub23n ='$mainfull', sub23sn ='$mainshort' ,
                               sub24n ='$addifull', sub24sn ='$addishort' ,roll='$roll',name='$name'                
                               where uid = '$uid'"
             );
             
             
                DB::update(
              "update invoices set roll='$roll',name='$name'          
                         where uid = '$uid'"
              );



         

           if($request->hasfile('image') && $school->image_access=='Yes'){

             $imgfile=$request->input('class').$request->input('babu').$school->section.$request->input('roll').'-';
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

         $school=schoolsession();
         $student=student::find($request->input('id'));
         $path='uploads/student/'.$student->image;
             if(File::exists($path)){
                 File::delete($path);
             }
        $delete=$student->delete();

          $examinfo=Examinfo::where('eiin',schoolsession()->eiin)->where('babu',$student->babu)
          ->where('class',$student->class)->first();

           $payment=Paymentinfo::where('eiin',schoolsession()->eiin)->where('babu',$student->babu)
          ->where('class',$student->class)->where('section',Session::get('section'))->first();

          DB::table('marks')->where('uid', $request->input('id'))
           ->where('year',$examinfo->year)->where('exam',$examinfo->exam)->delete();

          $invoice=DB::table('invoices')->where('uid', $request->input('id'))->get();
          if($invoice->count()>0){
           DB::table('invoices')->where('uid', $request->input('id'))->where('invoice_date',$payment->date)->delete();
          }

          $attens=DB::table('attens')->where('uid', $request->input('id'))->get();
          if($attens->count()>0){
           DB::table('attens')->where('uid', $request->input('id'))->delete();
          }
     
        return response()->json([
           'status'=>200,  
           'message'=>'Deleted Data',
         ]);
      }


      function loginview(){
        return view('student.login');
       }


       public function login(Request $request){
        $request->validate([
            'eiin'=>'required',
            'stu_id'=>'required',
       ]);
       $status=1;
       $student=Student::where('eiin','=',$request->eiin)->where('stu_id','=',$request->stu_id)->first();
       if($student){
             $request->session()->put('student',$student);
             return redirect('/student/dashboard');
           }
           else{
               return back()->with('fail','Incorrect Student Id Or EIIN Number');
          }
       }


       function dashboard(){
           if(Session::has('student')){
              $student=Student::where('id','=',Session::get('student')->id)->first();
           }
    
           return view('student.dashboard',['student'=>$student]); 
       }


       public function logout(){
        if(Session::has('student')){
            Session::pull('student');
            return redirect('student/login');
          }
        }
      

      
        function result(){
            $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
            $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
            $section=Exam::where('babu','section')->orderBy('serial','asc')->get();
            return view('student.result',['exam'=>$exam ,'year'=>$year ,'section'=>$section]);
         }

          function payment(){
            
             $student=studentsession();
           
             $invoice=DB::table('invoices')
            ->leftjoin('students', 'students.id', '=', 'invoices.uid')
            ->where('invoices.uid',$student->id)
            ->where('invoices.eiin',$student->eiin)->where('invoices.class',$student->class)->where('invoices.babu',$student->babu)
            ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
             ,'students.image','students.addi','invoices.*')
            ->orderBy('students.roll','asc')->get();

            return view('student.payment',['invoice'=>$invoice ]);
          }

          function atten(){

           $student=studentsession();
           $atten=Atten::where('eiin',$student->eiin)->where('uid',$student->id)->get();
         

            return view('student.atten',['atten'=>$atten ]);
          }
  
      



}
