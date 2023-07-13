<?php

namespace App\Http\Controllers;

use App\Models\Paymentinfo;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Spend;
use App\Models\Exam;
use App\Models\Admit;
use App\Models\Student;
use App\Models\Invoice;
use DB;
use Hash;
use Mail;
use Session;
use PDF;

class PaymentinfoController extends Controller
{
    
    public function index()
       {
            $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
            $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
            $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
            $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();
            return view('admin.paymentinfo',['admin'=>$admin,'subject'=>$subject,'class'=>$class,'group'=>$group]);
       }



    public function store(Request $request){

        $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
        $data= Paymentinfo::where('babu',$request->input('babu'))->where('class',$request->input('class'))
        ->where('section', $admin->admin_section)->where('eiin',$admin->eiin)->count('id');
        if($data>=1){
           return response()->json([
               'status'=>200,  
               'message'=>'Class & Group already exist',
           ]);
        }else{
           if(empty($request->input('amount1'))){ 
               $a1=0;
            }else{
              $a1=$request->input('amount1');
            }

              $month=date('n',strtotime($_POST['date']));
              $year=date('Y',strtotime($_POST['date']));

                 $model= new Paymentinfo;
                 $model->eiin=$admin->eiin;
                 $model->section=$admin->admin_section;
                 $model->class=$request->input('class');
                 $model->babu=$request->input('babu');
                 $model->date=$request->input('date');
                 $model->month=$month;
                 $model->year=$year;
                 $model->des1=$request->input('des1');
                 $model->des_amount1=$request->input('des_amount1');
                 $model->amount1=$a1;
                 $model->save();
    
           return response()->json([
             'status'=>100,  
             'message'=>'Data Added Successfull',
          ]);
        }
     }



     public function fetchAll() {
        $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
        $data = Paymentinfo::where('section',$admin->admin_section)->where('eiin',$admin->eiin)->get();
        $output = '';
        if ($data->count()> 0) {
          $output.=' <h5 class="text-success"> Total Row : '.$data->count().' </h5>';	
           $output .= '<table class="table table-bordered table-sm text-start align-middle">
           <thead>
             <tr>
                <th>Class</th>
                <th>Group</th>
                <th>Section</th>
                <th>Date</th>
                <th>Description </th>
                <th>Description amount</th>
                <th>Total amount </th>
                <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
             $output .= '<tr>
               <td>' . $row->class . '</td>
               <td>' . $row->babu .'</td>
               <td>' . $row->section. '</td>
               <td>' . $row->date. '</td>
               <td>' . $row->des1 . '</td>
               <td>' . $row->des_amount1 . '</td>
               <td>' . $row->amount1 . '</td>
               <td>
                   <a href="#" id="' . $row->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i>Edit/View</a>
                   <a href="#" id="' .$row->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i>Delete</a>
                </td>
             </tr>';
          }
           $output .= '</tbody></table>';
           echo $output;
         }else{
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
         }
     }  


       public function edit(Request $request) {
            $id = $request->id;
          $data = Paymentinfo::find($id);
         return response()->json([
           'status'=>100,  
            'data'=>$data,
         ]);
       }


       // update admin panel
      public function update(Request $request ){

         $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
         $month=date('n',strtotime($_POST['date']));
         $year=date('Y',strtotime($_POST['date']));

      
        $model=Paymentinfo::find($request->input('edit_id'));
        if($model){
            $model->eiin=$admin->eiin;
            $model->section=$admin->admin_section;
            $model->class=$request->input('class');
            $model->babu=$request->input('babu');
          
            $model->des1=$request->input('des1');
            $model->date=$request->input('date');
            $model->month=$month;
            $model->year=$year;
            $model->des_amount1=$request->input('des_amount1');
            $model->amount1=$request->input('amount1');
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
        $model=Paymentinfo::find($request->input('id'));
        $model->delete();
          return response()->json([
              'status'=>200,  
              'message'=>'Deleted Data',
            ]);
       }


       public function indexschool()
         {
            if(Session::has('school')){ 
                 $school=School::where('eiin',Session::get('school')->eiin)->first();  
            }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
                 $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
            }else{
                 return redirect()->back();
             }

           $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
           $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
           $subject=Exam::where('babu','subject')->orderBy('text1','asc')->get();

           $data = Paymentinfo::where('section',Session::get('section'))->where('eiin',$school->eiin)->get();
           return view('school.paymentinfo',['data'=>$data,'school'=>$school,'subject'=>$subject,'class'=>$class,'group'=>$group]);
       
          }

           //get method with query parameter
      public function monthly_invoice(){
            $section=Session::get('section');
             if(Session::has('school')){ 
                   $school=School::where('eiin',Session::get('school')->eiin)->first();  
             }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
                   $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
             }else{
                   return redirect()->back();
             }

          $classrow=Exam::where('babu','class')->orderBy('serial','asc')->get();
          $grouprow=Exam::where('babu','group')->orderBy('serial','asc')->get();
          $sectionrow=Exam::where('babu','section')->orderBy('serial','asc')->get();

          if(isset($_GET['group']) && isset($_GET['class']) && isset($_GET['date']) && isset($_GET['action']) ){
                $group=$_GET['group'];
                $class=$_GET['class'];
                $date=$_GET['date'];
                $action=$_GET['action'];
                $section=$_GET['section'];
          }else{
               $group='';
               $class='';
               $date='';
               $action='';  
               $section='';  
          }

          $month=date('n',strtotime($date));
          $year=date('Y',strtotime($date));
    
           $data=[];
           $fail='';
            if(!empty($section) && !empty($group) && !empty($date) && !empty($section)){
                $data=Invoice::where('section',$section)->where('babu',$group)->where('class',$class)->where('category','Invoice')
                 ->where('month',$month)->where('year',$year)->where('eiin',$school->eiin)->get();
             }

        return view('school.monthly-invoice',['school'=>$school ,'data'=>$data,'classrow'=>$classrow,
          'grouprow'=>$grouprow,'sectionrow'=>$sectionrow,'group'=>$group,'class'=>$class,'date'=>$date,
          'section'=>$section,'data'=>$data,'fail'=>$fail,'action'=>$action]);
        }

              //Post method invoice create
      public function invoice_create(Request $request) {

          $month=date('n',strtotime($_POST['month']));
          $year=date('Y',strtotime($_POST['month']));
          $class=$request->input('class');
          $section=$request->input('section');
          $babu=$request->input('babu');
          $eiin=$request->input('eiin');
          $month1=date('F-Y',strtotime($_POST['month']));

          $data=Invoice::where('section',$section)->where('babu',$babu)->where('class',$class)
                 ->where('month',$month)->where('year',$year)->where('eiin',$eiin)->get();

           $student=Student::where('section',$section)->where('babu',$babu)->where('class',$class)
                 ->where('eiin',$eiin)->get();

           $paymentinfo=Paymentinfo::where('section',$section)->where('babu',$babu)
                  ->where('class',$class)->where('eiin',$eiin)->where('month',$month)->where('year',$year)->first();   

        if($paymentinfo){         
          if($data->count()<1){
                if($student){
                   foreach($student as $row){    
                    $invoice= new Invoice;
                    $invoice->uid=$row['id'];
                    $invoice->student_id=$row['stu_id'];
                    $invoice->eiin=$eiin;
                    $invoice->roll=$row['roll'];
                    $invoice->name=$row['name'];
                    $invoice->section=$section;
                    $invoice->class=$class;
                    $invoice->babu=$babu;
                    $invoice->category="Invoice";
                    $invoice->date=$paymentinfo->date;
                    $invoice->day=date('j',strtotime($paymentinfo->date));
                    $invoice->month=date('n',strtotime($paymentinfo->date));
                    $invoice->year=date('Y',strtotime($paymentinfo->date));
                    $invoice->invoice_des1=$paymentinfo->des1;
                    $invoice->invoice_des_amount1=$paymentinfo->des_amount1;
                    $invoice->invoice_amount1=$paymentinfo->amount1;
                    $invoice->invoice_amount=$paymentinfo->amount1;              
                    $invoice->save();
                   }
                   return back()->with('success','Update Information');
                }
                return back()->with('fail','Student not found ');
            }else{
                return back()->with('fail','Invoice Alraedy  Exist');
            }
          }else{
            return back()->with('fail','Payment Information data does not match');
          }

      }
      

       //get method
      public function payment_details(){

        $section=Session::get('section');
        if(Session::has('school')){ 
              $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
              $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
        }else{
              return redirect()->back();
        }

            return view('school.payment-details',['school'=>$school ]);
          
       }

          //get method 
       public function payment_details_fetch(Request $request){

          $section=Session::get('section');
          if(Session::has('school')){ 
                  $school=School::where('eiin',Session::get('school')->eiin)->first();  
           }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
                  $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
           }else{
                 return redirect()->back();
           }

           $invoice=Invoice::where('eiin',$school->eiin)->where('section',$section)->select('uid',DB::raw('count(id) as id_total')
           ,DB::raw('max(name) as name'),DB::raw('max(class) as class'),DB::raw('max(babu) as babu')
           ,DB::raw('max(section) as section'),DB::raw('max(roll) as roll'),DB::raw('max(student_id) as student_id')
           ,DB::raw('sum(invoice_amount) as invoice_amount') ,DB::raw('sum(payment_amount) as payment_amount'),
            DB::raw('sum(invoice_amount)-sum(payment_amount) as due_payment'))->orderBy('roll','asc')->groupBy('uid')->paginate(2);
            return view('school.payment-data',compact('invoice'));
         }

       //payment fetch data
      function payment_fetch_data(Request $request)
          {
            $section=Session::get('section');
            if(Session::has('school')){ 
                $school=School::where('eiin',Session::get('school')->eiin)->first();  
             }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
                $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
             }else{
                return redirect()->back();
             }
       if($request->ajax())
        {
          $sort_by = $request->get('sortby');
          $sort_type = $request->get('sorttype'); 
          $search = $request->get('search');
          $search = str_replace(" ", "%", $search);
          $invoice=Invoice::where('eiin',$school->eiin)->where('section',$section)
            ->Where('roll','like', '%'.$search.'%')
            ->orWhere('student_id','like', '%'.$search.'%')
            ->orWhere('name','like', '%'.$search.'%')
          ->select('uid',DB::raw('count(id) as id_total')
           ,DB::raw('max(name) as name'),DB::raw('max(class) as class'),DB::raw('max(babu) as babu')
           ,DB::raw('max(section) as section'),DB::raw('max(roll) as roll'),DB::raw('max(student_id) as student_id')
           ,DB::raw('sum(invoice_amount) as invoice_amount') ,DB::raw('sum(payment_amount) as payment_amount'),
            DB::raw('sum(invoice_amount)-sum(payment_amount) as due_payment'))->orderBy($sort_by, $sort_type)->groupBy('uid')->paginate(2);

          return view('school.payment-data', compact('invoice'))->render();        
        }
     }


     public function payment_data_view($uid){
        $invoice=Invoice::where('uid',$uid)->where('category','Invoice')->get();
        $payment=Invoice::where('uid',$uid)->where('category','Payment')->get();
         if($invoice){
            return response()->json([
                  'status'=>200,  
                  'value'=>$invoice,
                  'payment'=>$payment,
            ]);
        }else{
            return response()->json([
                 'status'=>404,  
                 'message'=>'Student not found',
             ]);
         }
     }

       public function payment_fetch($uid){
           $section=Session::get('section');
           if(Session::has('school')){ 
                 $school=School::where('eiin',Session::get('school')->eiin)->first();  
           }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
                 $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
           }else{
                return redirect()->back();
           }

          $invoice=Invoice::where('eiin',$school->eiin)->where('section',$section)->where('uid',$uid)
           ->select('uid',DB::raw('count(id) as id_total')
           ,DB::raw('max(name) as name'),DB::raw('max(class) as class'),DB::raw('max(babu) as babu')
           ,DB::raw('max(section) as section'),DB::raw('max(roll) as roll'),DB::raw('max(student_id) as student_id')
           ,DB::raw('sum(invoice_amount) as invoice_amount'),DB::raw('sum(payment_amount) as payment_amount'),
            DB::raw('sum(invoice_amount)-sum(payment_amount) as due_payment'))->groupBy('uid')->first();
        if($invoice){
            return response()->json([
                  'status'=>200,  
                  'value'=>$invoice,
             ]);
        }else{
              return response()->json([
                  'status'=>404,  
                  'message'=>'Student not found',
              ]);
         }
     }


     public function payment_create(Request $request){
         $uid=$request->input('pay_uid');
         $payment=$request->input('payment');

         $student=Student::find($uid);
         $time=date('Y-m-d H:i:s');
         $paymenttype='Admin';
         $date= date('Y-m-d');
         $day= date('d');
         $month= date('n');
         $year= date('Y');

         $invoice= new Invoice;
         $invoice->uid=$student->id;
         $invoice->student_id=$student->stu_id;;
         $invoice->eiin=$student->eiin;
         $invoice->roll=$student->roll;
         $invoice->name=$student->name;
         $invoice->section=$student->section;
         $invoice->class=$student->class;
         $invoice->babu=$student->babu;
         $invoice->category="Payment";
         $invoice->date=$date;
         $invoice->day=$day;
         $invoice->month=$month;
         $invoice->year=$year;
         $invoice->time=$time;
         $invoice->payment_amount=$payment; 
         $invoice->payment_type=$paymenttype;               
         $invoice->save();

         $mess=$payment." TK Payment Successfull. View Invoice";
          return response()->json([
              'status'=>200,  
              'message'=>$mess,
            ]);
     }


     public function invoice_delete(Request $request) {

      $section=Session::get('section');
      if(Session::has('school')){ 
            $school=School::where('eiin',Session::get('school')->eiin)->first();  
      }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
            $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
      }else{
           return redirect()->back();
      }

    
            
      $babu=$request->input('babu');
      $class=$request->input('class');
      $section=$request->input('section');
      $eiin=$request->input('eiin');
      $month=date('n',strtotime($_POST['month']));
      $year=date('Y',strtotime($_POST['month']));

      $data=Invoice::where('section',$section)->where('babu',$babu)->where('class',$class)->where('category','Invoice')
      ->where('month',$month)->where('year',$year)->where('eiin',$eiin)->first();

      $next=$school->text1;
      $table_time=strtotime($data->created_at);
      $cur_time=strtotime(date('Y-m-d H:i:s',strtotime("-".$next."hour")));

     
      if($table_time-$cur_time>0){
        DB::delete(
            "delete from invoices where eiin='$eiin' AND month='$month' 
             AND year='$year' 
             AND babu='$babu' AND class='$class' AND section='$section' "
           );  
           return redirect()->back()->with('success','Data Deleted Successfull');  
          }else{
            return redirect()->back()->with('fail','Invoice Delete Time Over');  
          }
       
     }


     public function paymentview(Request $request) {
      $id = $request->edit_id;
      $data = Paymentinfo::find($id);
         return response()->json([
           'status'=>100,  
           'data'=>$data,
        ]);
    }



    public function monthlyview(Request $request) {
      $id = $request->edit_id;
      $data = Invoice::find($id);
         return response()->json([
            'status'=>100,  
            'data'=>$data,
        ]);

      
    }




    public function monthly_update(Request $request ){
      
     $model=Invoice::find($request->input('edit_id'));
       if($model){
              $model->invoice_des2=$request->input('des2');
              $model->invoice_des_amount2=$request->input('des_amount2');
              $model->invoice_amount2=$request->input('amount2');
              $model->invoice_amount=$model->invoice_amount1-$request->input('amount2');
              $model->update();   
          }
          return redirect()->back()->with('success','Data Update Successfull');  
      }


      public function payment_summary(){

        if(Session::has('school')){ 
               $school=School::where('eiin',Session::get('school')->eiin)->first();  
         }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
             $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
         }else{
             return redirect()->back();
         }

         $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
         $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
         $group=Exam::where('babu','group')->orderBy('serial','asc')->get();

      return view('school.paymentsummary',['year'=>$year,'class'=>$class,'group'=>$group]);
   }

    

   public function class_wise_pdf(Request $request) {
            
    if(Session::has('school')){ 
      $school=School::where('eiin',Session::get('school')->eiin)->first();  
    }elseif(Session::has('teacher')){
      $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
    }
         $class=$request->input('class');
         $babu=$request->input('babu');
         $section=$request->input('section');

         if(empty($section)){
          $invoice=Invoice::where('eiin',$school->eiin)->where('babu',$babu)->where('class',$class)->select('uid',DB::raw('count(id) as id_total')
          ,DB::raw('max(name) as name'),DB::raw('max(class) as class'),DB::raw('max(babu) as babu')
          ,DB::raw('max(section) as section'),DB::raw('max(roll) as roll'),DB::raw('max(student_id) as student_id')
          ,DB::raw('sum(invoice_amount) as invoice_amount') ,DB::raw('sum(payment_amount) as payment_amount'),
           DB::raw('sum(invoice_amount)-sum(payment_amount) as due_payment'))->orderBy('roll','asc')->groupBy('uid')->get();
          
         }else{
          $invoice=Invoice::where('eiin',$school->eiin)->where('babu',$babu)->where('class',$class)->where('section',$section)->select('uid',DB::raw('count(id) as id_total')
          ,DB::raw('max(name) as name'),DB::raw('max(class) as class'),DB::raw('max(babu) as babu')
          ,DB::raw('max(section) as section'),DB::raw('max(roll) as roll'),DB::raw('max(student_id) as student_id')
          ,DB::raw('sum(invoice_amount) as invoice_amount') ,DB::raw('sum(payment_amount) as payment_amount'),
           DB::raw('sum(invoice_amount)-sum(payment_amount) as due_payment'))->orderBy('roll','asc')->groupBy('uid')->get();
          }
  
          // return $invoice;
           //die();
       /*  $data = [
          'title' => 'Welcome to OnlineWebTutorBlog.com',
          'class'=>$class,
          'school'=>$school,
          'babu'=>$babu,
          'status'=>$status,
          'invoice' => $invoice,
          'monthyear' => $monthyear,
        ];
        $file='Invoice-'.$class.'-'.$babu.'-'.$section.'.pdf';
        $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.invoice1',$data);
        //return $pdf->download($file);
        return  $pdf->stream($file,array('Attachment'=>false)); 
         //return $invoice;
         */

         return view('pdf.class-wise-pdf',[
          'invoice' => $invoice,
          'school'=>$school,
          'class'=>$class,
          'babu'=>$babu,
          'section'=>$section
          
    ]);
    }


    public function payment_month(Request $request) {
            
      if(Session::has('school')){ 
            $school=School::where('eiin',Session::get('school')->eiin)->first();  
       }elseif(Session::has('teacher')){
            $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
       }

           $month=$_POST['month'];
           $year=$_POST['year'];
          
           if(empty($month)){
              $invoice=Invoice::where('year',$year)->where('eiin',$school->eiin)->where('category','Payment')
              ->select('month',DB::raw('count(id) as id_total'),DB::raw('sum(payment_amount) as payment_total'))->orderBy('month','asc')->groupBy('month')->get();
           }else{
              $invoice=Invoice::where('category','Payment')
              ->where('month',$month)->where('year',$year)->where('eiin',$school->eiin)->get();
            }

             return view('pdf.payment-month',[
                 'invoice'=> $invoice,
                 'school'=>$school,
                 'month'=>$month,
                 'year'=>$year,
             ]);
        }
  

        public function spend_month(Request $request) {
            
             if(Session::has('school')){ 
                   $school=School::where('eiin',Session::get('school')->eiin)->first();  
             }elseif(Session::has('teacher')){
                   $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
              }
    
                $month=$_POST['month'];
                $year=$_POST['year'];
              
          if(empty($month)){
              $invoice=DB::table('spends')->where('year',$year)->where('eiin',$school->eiin)
              ->select('month',DB::raw('count(id) as id_total'),DB::raw('sum(total) as spend_total'))->orderBy('day','asc')->groupBy('month')->get();
           }else{
               $invoice=DB::table('spends')->where('month',$month)->where('year',$year)->where('eiin',$school->eiin)->get();  
           }
    
                 return view('pdf.spend-month',[
                     'invoice'=> $invoice,
                     'school'=>$school,
                     'month'=>$month,
                     'year'=>$year,
                 ]);

            }
      
           
            public function spendday(Request $request) {

              if(Session::has('school')){ 
                      $school=School::where('eiin',Session::get('school')->eiin)->first();  
              }elseif(Session::has('teacher')){
                      $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
              }
                 $day=date('Y-m-d',strtotime($_POST['date']));
                 $day1=date('d-F-Y',strtotime($_POST['date']));
                 $file='spend'.$day1.'.pdf';	
                 $spend=DB::table('spends')->where('eiin',$school->eiin)->where('date',$day)->get();
               
                 return view('pdf.spendday',[
                  'day1'=>$day1,
                  'school'=>$school,
                  'spend' => $spend, 
              ]);

      
             }


             public function paymentday(Request $request) {

              if(Session::has('school')){ 
                    $school=School::where('eiin',Session::get('school')->eiin)->first();  
              }elseif(Session::has('teacher')){
                    $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
              }
                 $day=date('Y-m-d',strtotime($_POST['date']));
                 $day1=date('d-F-Y',strtotime($_POST['date']));
                 $file='spend'.$day1.'.pdf';	
                 $payment=DB::table('invoices')->where('eiin',$school->eiin)->where('date',$day)->get();
               
                 return view('pdf.paymentday',[
                  'day1'=>$day1,
                  'school'=>$school,
                  'payment' => $payment, 
              ]);
         }


          // update School panel
      public function paymentinfoupdate(Request $request ){

       $model=Paymentinfo::find($request->input('edit_id'));
         if($model){
              $model->des1=$request->input('des1');
              $model->des_amount1=$request->input('des_amount1');
              $model->amount1=$request->input('amount1');
              $model->update();   
          }

         return back()->with('success','Update Information');
     }
      
      
      
    
  
     //get method with query parameter
     public function monthly_payment(){
         $section=Session::get('section');
        if(Session::has('school')){ 
             $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
             $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
        }else{
             return redirect()->back();
        }

    $classrow=Exam::where('babu','class')->orderBy('serial','asc')->get();
    $grouprow=Exam::where('babu','group')->orderBy('serial','asc')->get();
    $sectionrow=Exam::where('babu','section')->orderBy('serial','asc')->get();

    if(isset($_GET['group']) && isset($_GET['class']) && isset($_GET['date']) && isset($_GET['action']) ){
          $group=$_GET['group'];
          $class=$_GET['class'];
          $date=$_GET['date'];
          $action=$_GET['action'];
          $section=$_GET['section'];
    }else{
         $group='';
         $class='';
         $date='';
         $action='';  
         $section='';  
    }

    $month=date('n',strtotime($date));
    $year=date('Y',strtotime($date));

     $data=[];
     $fail='';
      if(!empty($section) && !empty($group) && !empty($date) && !empty($section)){
          $data=Invoice::where('section',$section)->where('babu',$group)->where('class',$class)->where('category','Payment')
           ->where('month',$month)->where('year',$year)->where('eiin',$school->eiin)->get();
       }

  return view('school.monthly-payment',['school'=>$school ,'data'=>$data,'classrow'=>$classrow,
    'grouprow'=>$grouprow,'sectionrow'=>$sectionrow,'group'=>$group,'class'=>$class,'date'=>$date,
    'section'=>$section,'data'=>$data,'fail'=>$fail,'action'=>$action]);
  }


  public function payment_update(Request $request ){
       $model=Invoice::find($request->input('edit_id'));
      if($model){
             $model->payment_amount=$request->input('amount');
             $model->update();   
         }
         return redirect()->back()->with('success','Data Update Successfull');  
     }







   




   
 
 

    }
