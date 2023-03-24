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
   
          if(empty($request->input('amount2'))){ 
           $a2=0;
         }else{
           $a2=$request->input('amount2');
         }
   
         if(empty($request->input('amount3'))){ 
           $a3=0;
         }else{
           $a3=$request->input('amount3');
         }
   
         if(empty($request->input('amount4'))){ 
           $a4=0;
         }else{
           $a4=$request->input('amount4');
         }
   
         if(empty($request->input('amount5'))){ 
            $a5=0;
           }else{
            $a5=$request->input('amount5');
          }

          if(empty($request->input('amount6'))){ 
             $a6=0;
           }else{
             $a6=$request->input('amount6');
           }

                 $model= new Paymentinfo;
                 $model->eiin=$admin->eiin;
                 $model->section=$admin->admin_section;
                 $model->class=$request->input('class');
                 $model->babu=$request->input('babu');
                 $model->date=$request->input('date');
                 $model->month=date('n',strtotime($_POST['date']));
                 $model->year=date('Y',strtotime($_POST['date']));

                 $model->des1=$request->input('des1');
                 $model->des2=$request->input('des2');
                 $model->des3=$request->input('des3');
                 $model->des4=$request->input('des4');
                 $model->des5=$request->input('des5');
                 $model->des6=$request->input('des6');
                
                 $model->amount1=$a1;
                 $model->amount2=$a2;
                 $model->amount3=$a3;
                 $model->amount4=$a4;
                 $model->amount5=$a5;
                 $model->amount6=$a6;
                 
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
                <th>Payment month</th>
                <th>Description 1</th>
                <th>amount 1</th>
                <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           foreach ($data as $row) {
             $output .= '<tr>
               <td>' . $row->class . '</td>
               <td>' . $row->babu .'</td>
               <td>' . $row->section. '</td>
               <td>' . date('F-Y',strtotime($row->date)) . '</td>
               <td>' . $row->des1 . '</td>
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



      public function update(Request $request ){

        $admin=School::where('eiin','=',Session::get('admin')->eiin)->first();
      
        $model=Paymentinfo::find($request->input('edit_id'));
        if($model){
            $model->eiin=$admin->eiin;
            $model->section=$admin->admin_section;
            $model->class=$request->input('class');
            $model->babu=$request->input('babu');
            $model->date=$request->input('date');
            $model->month=date('n',strtotime($_POST['date']));
            $model->year=date('Y',strtotime($_POST['date']));


          $model->des1=$request->input('des1');
          $model->des2=$request->input('des2');
          $model->des3=$request->input('des3');
          $model->des4=$request->input('des4');
          $model->des5=$request->input('des5');
          $model->des6=$request->input('des6');
         
          $model->amount1=$request->input('amount1');
          $model->amount2=$request->input('amount2');
          $model->amount3=$request->input('amount3');
          $model->amount4=$request->input('amount4');
          $model->amount5=$request->input('amount5');
          $model->amount6=$request->input('amount6');
          
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


      public function invoiceview(){
        $section=Session::get('section');
        $status=1;
        if(Session::has('school')){ 
               $school=School::where('eiin',Session::get('school')->eiin)->first();  
            }elseif(Session::has('teacher') && Session::get('teacher')->teacher_fin_access){
               $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
            }else{
              return redirect()->back();
           }

          $paymentinfo=Paymentinfo::where('section',$section)->where('eiin',$school->eiin)->first();

         $payment=DB::table('invoices')->where('status',$status)->where('invoice_month',$paymentinfo->month)
         ->where('invoice_year',$paymentinfo->year)->where('section',$section)->count('id');

          $invoice = DB::table('invoices')
                ->leftjoin('students', 'students.id', '=', 'invoices.uid')
                ->where('invoices.section',$section)
                ->where('invoices.invoice_month',$paymentinfo->month)->where('invoices.invoice_year',$paymentinfo->year)
                ->where('invoices.eiin',$school->eiin)
                ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
                 ,'students.image','students.addi','invoices.*')
                ->orderBy('students.roll','asc')->get();

        //return prx($student);
        return view('school.invoice',['school'=>$school ,'invoice'=>$invoice,'payment'=>$payment]);

      }


      
      public function invoice_detail($edit_id){
            $invoice=Invoice::find($edit_id);
            return response()->json([
               'status'=>500,
               'invoice'=>$invoice,
               'name'=>studentinfo($invoice->uid,'name'),
               'stu_id'=>studentinfo($invoice->uid,'stu_id'),
               'roll'=>studentinfo($invoice->uid,'roll'),
            ]);
       }

    public function invoiceupdate(Request $request) {

       $status=$request->input('status');
       $invoice_id=$request->input('invoice_id_view');

      if($status == 1){
           $status1=0;
           $paymenttime=date('2010-10-10 10:10:10');
           $paymenttype='';
       }else{
           $status1=1;
           $paymenttime=date('Y-m-d H:i:s');
           $paymenttype='Admin';
       }
       $payment_date= date('Y-m-d');
       $payment_day= date('d');
       $payment_month= date('n');
       $payment_year= date('Y');
      
       DB::update(
         "update invoices set status ='$status1', payment_time=' $paymenttime',payment_type='$paymenttype' 
         ,payment_date='$payment_date',payment_day='$payment_day',payment_month='$payment_month', payment_year='$payment_year' where id ='$invoice_id'"
      );

      return back()->with('success','Update Information');
    }


    public function invoicedate(Request $request) {

        $validated = $request->validate([
           'date' => 'required|max:255',
           'pre_date' => 'required|max:255',
         ]);

         if(Session::has('school')){ 
            $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher')){
            $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
        }

        $section=Session::get('section');
        $date=$request->input('date');
        $month=date('n',strtotime($_POST['date']));
        $year=date('Y',strtotime($_POST['date']));

        $pre_date=$request->input('pre_date');
        $pre_month=date('n',strtotime($_POST['pre_date']));
        $pre_year=date('Y',strtotime($_POST['pre_date']));

      DB::update(
        "update paymentinfos set date ='$date' ,month='$month' ,year='$year' ,
        pre_date ='$pre_date' ,pre_month='$pre_month' ,pre_year='$pre_year' 
         where eiin ='$school->eiin' AND  section ='$section'"
      );

      return back()->with('success','Update Information');

    }


    public function paymentview(Request $request) {
      $id = $request->edit_id;
      $data = Paymentinfo::find($id);
      return response()->json([
        'status'=>100,  
        'data'=>$data,
      ]);
    }

    public function paymentinfoupdate(Request $request ){


      if(empty($request->input('amount1'))){ 
         $a1=0;
       }else{
         $a1=$request->input('amount1');
       }

       if(empty($request->input('amount2'))){ 
        $a2=0;
      }else{
        $a2=$request->input('amount2');
      }

      if(empty($request->input('amount3'))){ 
          $a3=0;
        }else{
          $a3=$request->input('amount3');
       }

       if(empty($request->input('amount4'))){ 
           $a4=0;
        }else{
           $a4=$request->input('amount4');
        }

       if(empty($request->input('amount5'))){ 
          $a5=0;
           }else{
          $a5=$request->input('amount5');
        }
  
      $model=Paymentinfo::find($request->input('edit_id'));
      if($model){
        $model->des1=$request->input('des1');
        $model->des2=$request->input('des2');
        $model->des3=$request->input('des3');
        $model->des4=$request->input('des4');
        $model->des5=$request->input('des5');
      
        $model->amount1=$a1;
        $model->amount2=$a2;
        $model->amount3=$a3;
        $model->amount4=$a4;
        $model->amount5=$a5;
       
        
        $model->update();   
        return back()->with('success','Payment Info Update Successfully');
      }else{
        return back()->with('danger','Data Not Found');
      }

    }


    public function invoice_pdftwo($id,$uid){

      if(Session::has('school')){ 
        $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher')){
        $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
        }

         $data = Invoice::where('id',$id)->where('uid',$uid)->first();
          return view('pdf.invoicepdftwo',['data'=>$data ,'school'=>$school]);
    }


    public function invoice_pdfthree($id,$uid){

      if(Session::has('school')){ 
            $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher')){
            $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
         }

         $data = Invoice::where('id',$id)->where('uid',$uid)->first();
          return view('pdf.invoicepdfthree',['data'=>$data ,'school'=>$school]);
    }


    public function invoicedes(Request $request) {

      $id=  $request->input('inv_id');
      $des6=  $request->input('des6');
      $amount6=  $request->input('amount6');
      $invoice=Invoice::find($id);
            $amount1=$invoice->amount1;
            $amount2=$invoice->amount2;
            $amount3=$invoice->amount3;
            $amount4=$invoice->amount4;
            $amount5=$invoice->amount5;
            $pre_monthdue=$invoice->pre_monthdue;
           
         

          $model = Invoice::find($id);
          $model->des6=$des6;
          $model->amount6=$amount6;
          $model->totalamount=$amount1+$amount2+$amount3+$amount4+$amount5+$amount6;
          $model->cur_monthpayment=$pre_monthdue+$amount1+$amount2+$amount3+$amount4+$amount5+$amount6;
          $model->update();   

          return back()->with('success','Description  Update Successfully');
    }


     public function invoicesummary(){

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

        return view('school.invoicesummary',['year'=>$year,'class'=>$class,'group'=>$group]);
     }


     public function invoicepart1(Request $request) {
            
      if(Session::has('school')){ 
        $school=School::where('eiin',Session::get('school')->eiin)->first();  
      }elseif(Session::has('teacher')){
        $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
      }
           $class=$request->input('class');
           $babu=$request->input('babu');
           $status=$request->input('status');
           $section=$request->input('section');

           $month=date('n',strtotime($_POST['month']));
           $year=date('Y',strtotime($_POST['month']));
           $monthyear=$request->input('month');
           if(empty($section)){
            $invoice = DB::table('invoices')
              ->leftjoin('students', 'students.id', '=', 'invoices.uid')
              ->where('invoices.invoice_month',$month)->where('invoices.invoice_year',$year)
              ->where('invoices.eiin',$school->eiin)->where('invoices.class',$class)
              ->where('invoices.babu',$babu)->where('invoices.status',$status)
              ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
              ,'students.image','students.addi','invoices.*')
              ->orderBy('students.roll','asc')->get();
            
           }else{
             $invoice = DB::table('invoices')
                ->leftjoin('students', 'students.id','=','invoices.uid')
                ->where('invoices.section',$section)
                ->where('invoices.invoice_month',$month)->where('invoices.invoice_year',$year)
                ->where('invoices.eiin',$school->eiin)->where('invoices.class',$class)
                ->where('invoices.babu',$babu)->where('invoices.status',$status)
                ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
                ,'students.image','students.addi','invoices.*')
                ->orderBy('students.roll','asc')->get();
            }
    

             //return $invoice->sum('cur_monthpayment');
            // die();
           $data = [
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
      }

      public function invoicepart2(Request $request) {

        if(Session::has('school')){ 
          $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher')){
          $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
        }
        $month=date('n',strtotime($_POST['month']));
        $year=date('Y',strtotime($_POST['month']));
        $monthyear=$request->input('month');
        $status=$request->input('status');

        $invoice = DB::table('invoices')
           ->leftjoin('students', 'students.id', '=', 'invoices.uid')
           ->where('invoices.invoice_month',$month)->where('invoices.invoice_year',$year)
           ->where('invoices.eiin',$school->eiin)->where('invoices.status',$status)
           ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
           ,'students.image','students.addi','invoices.*')
           ->orderBy('invoices.class','asc')->get();

          //  return $invoice;
          // die();
          $data = [
             'title' => 'Welcome to OnlineWebTutorBlog.com',
             'status'=>$status,
             'school'=>$school,
             'invoice' => $invoice,
             'monthyear' => $monthyear, 
          ];

       $file='Invoice-'.$monthyear.'.pdf';
       $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.invoice2',$data);
       //return $pdf->download($file);
        return  $pdf->stream($file,array('Attachment'=>false)); 
          
       }

       public function invoicepart3(Request $request) {

        if(Session::has('school')){ 
          $school=School::where('eiin',Session::get('school')->eiin)->first();  
        }elseif(Session::has('teacher')){
          $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
        }
          $month=date('n',strtotime($_POST['month']));
          $year=date('Y',strtotime($_POST['month']));
          $monthyear=$request->input('month');

          
             $invoice=DB::table('invoices')->where('eiin',$school->eiin)->where('invoice_month',$month)
             ->where('invoice_year',$year)
             ->select(DB::raw('count(id) as id'),DB::raw('sum(pre_monthdue) as pre_monthdue')
             ,DB::raw('sum(totalamount) as totalamount'),DB::raw('sum(cur_monthpayment) as cur_monthpayment')
             ,DB::raw('sum(cur_monthdue) as cur_monthdue'))->orderBy('id','asc')->first();

             $payment=DB::table('invoices')->where('eiin',$school->eiin)->where('invoice_month',$month)
            ->where('invoice_year',$year)->where('status',1)
            ->select(DB::raw('count(id) as id'),DB::raw('sum(cur_monthpayment) as cur_monthpayment'))->orderBy('id','asc')->first();
                       

             $data = [
               'title' => 'Welcome to OnlineWebTutorBlog.com',
               'payment'=>$payment,
               'school'=>$school,
               'invoice' => $invoice,
               'monthyear' => $monthyear, 
             ];
 
            $file='Ovarall Summary-'.$monthyear.'.pdf';
            $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.invoice3',$data);
            //return $pdf->download($file);
            return  $pdf->stream($file,array('Attachment'=>false)); 

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
         
          
            //return $spend;
            //die();
           $data = [
            'title' => 'Welcome to OnlineWebTutorBlog.com',
            'day1'=>$day1,
            'school'=>$school,
            'spend' => $spend, 
          ];

         $file='Ovarall Summary -'.$day1.'.pdf';
         $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.spendday',$data);
         //return $pdf->download($file);
         return  $pdf->stream($file,array('Attachment'=>false)); 

       }


        public function spendmonth(Request $request) {

          if(Session::has('school')){ 
            $school=School::where('eiin',Session::get('school')->eiin)->first();  
          }elseif(Session::has('teacher')){
            $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
          }
           $month=date('n',strtotime($_POST['month']));
           $year=date('Y',strtotime($_POST['month']));
      
           $month1=date('F-Y',strtotime($_POST['month']));
           $file='Spend'.$month1.'.pdf';

           $spend=DB::table('spends')->where('year',$year)->where('month',$month)->where('eiin',$school->eiin)
           ->select('day',DB::raw('count(id) as id_total'),DB::raw('sum(total) as spend_total'))->orderBy('day','asc')->groupBy('day')->get();
         
           $data =[
               'title' => 'Welcome to OnlineWebTutorBlog.com',
               'month1'=>$month1,
               'spend' => $spend, 
               'school'=>$school,
             ];

          $file='Ovarall Summary-'.$month1.'.pdf';
          $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.spendmonth',$data);
          //return $pdf->download($file);
          return  $pdf->stream($file,array('Attachment'=>false)); 
        }


        public function paymentday(Request $request){

          if(Session::has('school')){ 
            $school=School::where('eiin',Session::get('school')->eiin)->first();  
          }elseif(Session::has('teacher')){
            $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
          }
           $date=date('Y-m-d',strtotime($_POST['date']));
    
           $date1=date('d-F-Y',strtotime($_POST['date']));
           $file='Paymentlist_'.$date1.'.pdf';	
           $status=1;

          $invoice = DB::table('invoices')
             ->leftjoin('students', 'students.id', '=', 'invoices.uid')
             ->where('invoices.payment_date',$date)
             ->where('invoices.eiin',$school->eiin)->where('invoices.status',$status)
             ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
             ,'students.image','students.addi','invoices.*')
             ->orderBy('invoices.class','asc')->get();

            $data = [
              'title' =>'Welcome to OnlineWebTutorBlog.com',
              'status'=>$status,
              'invoice' => $invoice,
              'date1' => $date1, 
             ];
 
           $file='Payment-'.$date1.'.pdf';
           $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.paymentday',$data);
           //return $pdf->download($file);
           return  $pdf->stream($file,array('Attachment'=>false)); 
        }


          public function invoicemonth(Request $request){
             $section=Session::get('section');
             if(Session::has('school')){ 
              $school=School::where('eiin',Session::get('school')->eiin)->first();  
            }elseif(Session::has('teacher')){
              $school=School::where('eiin',Session::get('teacher')->eiin)->first();  
            }
             $info=Paymentinfo::where('section',$section)->where('eiin',$school->eiin)->first();
             $count_exist=DB::table('invoices')->where('invoice_month',$info->month)->where('invoice_year',$info->year)
                   ->where('section',$section)->where('eiin',$school->eiin)->count('id');
          

            if($count_exist>=1){
                   return back()->with('fail','Invoice already exist');  
                }else{ 
                    foreach(paymentinfo() as $data){
                         invoice_create($data->class,$data->babu);
                     };
                 return back()->with('success','Invoice Update Successfull');  
               }                  
          }
 
 

    }
