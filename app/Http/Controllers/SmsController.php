<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Mark;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Examinfo;
use App\Models\Paymentinfo;
use Session;
use DB;
use PDF;

class SmsController extends Controller
{
   
  function payment_api(){

    $payment=DB::table('eiin_sms')->where('status',1)->select('eiin',DB::raw('count(id) as id_total')
    ,DB::raw('sum(smsno) as invoice_amount') ,DB::raw('sum(payment) as payment_amount')
    ,DB::raw('sum(smsno)-sum(payment) as payment'))->orderBy('eiin','asc')->groupBy('eiin')->get();

    return $payment;
  }

  
    public function smsview()
       {
          $school=schoolsession();
          $class=Exam::where('babu','class')->orderBy('serial','asc')->get();
          $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
          $smsbuy=DB::table('eiin_sms')->where('eiin',$school->eiin)->where('verify_status',1)
          ->where('status',1)->sum('smsno');
          $smsspend=DB::table('sms')->where('eiin',$school->eiin)->sum('sms_count');
          $sms=$smsbuy-$smsspend;
          return view('school.smsview',['class'=>$class ,'group'=>$group ,'school'=>$school ,'sms'=>$sms]);
       }

       public function smsbuy()
       {
          $school=schoolsession();  
          $smsbuy=DB::table('eiin_sms')->where('eiin',$school->eiin)->get();
          $smslist=Exam::where('babu','sms')->orderBy('serial','asc')->get();
          $activesms=DB::table('eiin_sms')->where('eiin',$school->eiin)->where('verify_status',1)
          ->where('status',1)->sum('smsno');
          return view('school.smsbuy',['school'=>$school ,'smsbuy'=>$smsbuy,'smslist'=>$smslist,'activesms'=>$activesms]);
       }

       public function smsdetails()
       {
             $school=schoolsession();  
             $smsbuy=DB::table('eiin_sms')->where('eiin',$school->eiin)->where('verify_status',1)
            ->where('status',1)->get();
             $smsspend=DB::table('sms')->where('eiin',$school->eiin)->get();
             return view('school.smsdetails',['school'=>$school ,'smsbuy'=>$smsbuy,'smsspend'=>$smsspend]);
       }


       public function smsinsert(Request $request){
        $school=schoolsession();  
        $smsbuy=DB::table('eiin_sms')->where('eiin',$school->eiin)->where('verify_status',1)
        ->where('status',1)->sum('smsno');
        $smsspend=DB::table('sms')->where('eiin',$school->eiin)->sum('sms_count');
        $sms=$smsbuy-$smsspend;
      if($sms>0){
            $sms_type=$request->input('sms_type');
             if($sms_type=='single'){
                  $text=$request->input('text');
                  $phone=$request->input('phone');
                  $phonearr='88'.$phone;
                  $textinfo=$text;
                 send_sms($phonearr,$textinfo);
                  
                  $model=new Sms;
                  $model->eiin=$school->eiin;
                  $model->sms_type=$sms_type;
                  $model->sms_count=1;
                  $model->text=$text;
                  $model->save();

               }else if($sms_type=='teachers'){
                     $text=$request->input('text');
                     $data=Teacher::where('eiin',$school->eiin)->get();
                     $smscount=$data->count();
                     $textinfo=$text;
                     foreach( $data as $row){
                         $phonearr='88'.$row->phone;
                         send_sms($phonearr,$textinfo); 
                          }
                         $model=new Sms;
                         $model->eiin=$school->eiin;
                         $model->sms_type=$sms_type;
                         $model->sms_count=$smscount;
                         $model->text=$text;
                         $model->save();

                }else if($sms_type=='students'){
                        $text=$request->input('text');
                        $class=$request->input('class');
                        $section=$request->input('section');
                        $babu=$request->input('babu');
                     $data=Student::where('eiin',$school->eiin)->where('babu',$babu)->where('class',$class)
                     ->where('section',$section)->get();
                     $smscount=$data->count();
                     $textinfo=$text;
                     foreach( $data as $row){
                       $phonearr='88'.$row->phone;
                       send_sms($phonearr,$textinfo); 
                      }
                      $model=new Sms;
                      $model->eiin=$school->eiin;
                      $model->sms_type=$sms_type;
                      $model->sms_count=$smscount;
                      $model->text=$textinfo;
                      $model->save();

                
             }else if($sms_type=='result'){
                $class=$request->input('class');
                $section=$request->input('section');
                $babu=$request->input('babu');
                $examinfo = Examinfo::where('babu',$babu)->where('class',$class)
                ->where('eiin',$school->eiin)->first();  

                $data = DB::table('marks')
                ->leftjoin('students', 'students.id', '=', 'marks.uid')
                ->where('marks.babu',$babu)->where('marks.class',$class)->where('marks.section',$section)
                ->where('marks.exam',$examinfo->exam)->where('marks.year',$examinfo->year)->where('marks.eiin',$school->eiin)
                ->select('students.name','students.stu_id','students.roll','students.phone','students.main','students.addi','marks.*')
                ->orderBy('students.roll','asc')->get();

              $smscount=$data->count();
              $text1='x.xx GPA  of '.examNameDes($examinfo->exam).'-'.$examinfo->year;
              foreach($data as $row){
                $phonearr='88'.$row->phone;
                $textinfo=$row->cgp.' GPA  of '.examNameDes($examinfo->exam).'-'.$examinfo->year;
                send_sms($phonearr,$textinfo); 
               }
               $model=new Sms;
               $model->eiin=$school->eiin;
               $model->sms_type=$sms_type;
               $model->sms_count=$smscount;
               $model->text=$text1;
               $model->class=$class;
               $model->section=$section;
               $model->babu=$babu;
               $model->save();

            }else if($sms_type=='payment'){
               $class=$request->input('class');
               $section=$request->input('section');
               $babu=$request->input('babu');
               $paymentinfo=Paymentinfo::where('section',$section)->where('eiin',$school->eiin)->first();

               $data = DB::table('invoices')
               ->leftjoin('students', 'students.id', '=', 'invoices.uid')
               ->where('invoices.section',$section)
               ->where('invoices.invoice_month',$paymentinfo->month)->where('invoices.invoice_year',$paymentinfo->year)
               ->where('invoices.eiin',$school->eiin)->where('invoices.class',$class)
               ->where('invoices.babu',$babu)
               ->select('students.name','students.stu_id','students.roll','students.phone','students.main'
                ,'students.image','students.addi','invoices.*')
               ->orderBy('students.roll','asc')->get();
               $smscount=$data->count();
               $text1='Tk Due from '.date('M-Y',strtotime($paymentinfo->date));
               foreach($data as $row){
                  $phonearr='88'.$row->phone;
                  $textinfo=$row->cur_monthpayment.'Tk Due from '.date('M-Y',strtotime($row->invoice_date));
                  send_sms($phonearr,$textinfo); 
                }
                $model=new Sms;
                $model->eiin=$school->eiin;
                $model->sms_type=$sms_type;
                $model->sms_count=$smscount;
                $model->text=$text1;
                $model->class=$class;
                $model->section=$section;
                $model->babu=$babu;
                $model->save();
            }
             
             return back()->with('success','SMS Send Successfully of '.$sms_type.' Panel');

          }else{
             return back()->with('danger','SMS not available');
          }

       }

     public function smstext_update(Request $request){
               $school=schoolsession(); 
               $model=School::find($school->id);
        if($model){    
               $model->sms_text1=$request->input('sms_text1');
               $model->sms_text2=$request->input('sms_text2');
               $model->sms_text3=$request->input('sms_text3');
               $model->sms_text4=$request->input('sms_text4');
               $model->update();   
            return back()->with('success','Text Update Successfully');
          }else{
            return back()->with('danger','Data Not Found');
          }
     }




       public function index(Request $request){
            $data =  DB::table('eiin_sms')->get();
             return view('maintain.smsinfo',['data'=>$data]);
        }


         



          

      public function smsbuyinsert(Request $request){

           $school=schoolsession(); 

           $sms['eiin']=$school->eiin;
           $sms['school']=$school->school;
           $sms['smsno']=round($request->input('payment')/.40);
           $sms['payment']=$request->input('payment');
           $sms['payment_type']='';
           $sms['ref']='';
           $sms['created_at']=date('Y-m-d H:i:s');
           DB::table('eiin_sms')->insert($sms);   
          return back()->with('success','Sms Submit  Successfully');
      }
      
        public function smsdelete($id){
          DB::delete(
            "delete from eiin_sms  where id = '$id'"
            );  
           return redirect()->back()->with('success','Online Payment  Deleted Successfuly');
      }



      public function smspayment(Request $request){  
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
          "update eiin_sms set status ='$status1', payment_time=' $paymenttime',payment_type='$paymenttype' 
          ,payment_date='$payment_date',payment_day='$payment_day',payment_month='$payment_month', payment_year='$payment_year' where id ='$invoice_id'"
         );
 
          return back()->with('success','Update Information');
      } 




      public function smsstatus($type,$status,$id){

        if($status=='deactive'){
            $status1=0;
          }else{
           //$type=md5(1);
             $status1=1;
          }

    if($type=='verify_status'){
        DB::update(
            "update eiin_sms set verify_status ='$status1' where id = '$id'"
           );  
           return back()->with('success','Admin Status change Successful'); 
      }
      }




      public function onlinesmspdf(Request $request){
    
         $month=date('n',strtotime($_POST['month']));
         $year=date('Y',strtotime($_POST['month']));
         $monthyear=$request->input('month');
         $status=$request->input('status');
         $invoice= DB::table('eiin_sms')->where('payment_month',$month)->where('payment_year',$year)->where('status',$status)->get();
   
           $file='Invoice-'.$monthyear.'.pdf';
   
           $data = [
               'title' => 'Welcome to OnlineWebTutorBlog.com',
               'invoice' => $invoice,
               'status' => $status,
               'monthyear' => $monthyear,
           ];
          
            $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.onlinesmspdf',$data);
           //return $pdf->download($file);
            return  $pdf->stream($file,array('Attachment'=>false)); 

      }

     


}
