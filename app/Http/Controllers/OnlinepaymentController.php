<?php

namespace App\Http\Controllers;

use App\Models\Onlinepayment;
use Illuminate\Http\Request;
use App\Models\School;
use Session;
use DB;
use PDF;


class OnlinepaymentController extends Controller
{
  
   
    public function onlinepaymentupdate(Request $request)
    {
       
        $school=School::get();
        //$expired_date=date("Y-m-d",strtotime($create_date.$subscribe."month"));

        foreach($school as  $row ){ 
           
           if(strtotime(date("Y-m-d"))-strtotime($row['expired_date'])>0){

                      $created_date=$row['expired_date'];
                      $expired_date=date("Y-m-d",strtotime($row['expired_date'].$row['subscribe']."month"));
                      $eiin=$row['eiin'];
                      $des1=$row['payment_details'];
                      $payment=$row['payment'];
                      $subscribe=$row['subscribe'];
                      $payment_duration=$row['payment_duration'];
                      $id=$row['id'];

                      $model= new Onlinepayment;
                      $model->eiin=$eiin;
                      $model->des1=$des1;
                      $model->amount1=$payment;
                      $model->payment=$payment;
                      $model->subscribe=$subscribe;
                      $model->payment_duration=$payment_duration;
                      $model->created_date=$created_date;
                      $model->expired_date=$expired_date;                    
                      $model->save();

             DB::update("update schools set created_date ='$created_date', expired_date ='$expired_date' 
                       where id = '$id'");
              }

        }
        return redirect("/")->with('success','Online Payment Update Successfull');
    }
    
    
       public function paymentdelete($id){
             $school=Onlinepayment::find($id);
             $school->delete();
             return redirect()->back()->with('success','Online Payment  Deleted Successfuly');
        }


    public function companypay()
    {
      //$data=Onlinepayment::where('eiin',Session::get('school')->eiin)->latest();
      $school=schoolsession();  
      $companypay=Onlinepayment::where('eiin',$school->eiin)->orderBy('id','desc')->get();
      //return prx($companypay);
      return view('school.companypay',['school'=>$school ,'companypay'=>$companypay]);
   }


   public function paymentprint(Request $request,$id){
       
      $school=schoolsession();
      $invoice=Onlinepayment::where('eiin',$school->eiin)->where('id',$id)->get();
      $file='Invoice-'.$school->eiin.'-'.$id.'.pdf';

      $data = [
           'title' => 'Welcome to OnlineWebTutorBlog.com',
           'invoice' => $invoice,
           'school' => $school,
      ];
     
    
       $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.paymentprint',$data);
       //return $pdf->download($file);
       return  $pdf->stream($file,array('Attachment'=>false)); 

      // return view('pdf.seatplan',['student'=>$student]);
  }



  public function paymentview()
   {
     $payment = DB::table('onlinepayments')
     ->leftjoin('schools','schools.eiin', '=','onlinepayments.eiin')
     ->select('schools.school','schools.school_phone','onlinepayments.*')
     ->orderBy('onlinepayments.id','asc')->get();

     return view('maintain.paymentinfo',['payment'=>$payment]);
    }


    public function onlinepaymentstatus(Request $request)
    {
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
        "update onlinepayments set status ='$status1', payment_time=' $paymenttime',payment_type='$paymenttype' 
        ,payment_date='$payment_date',payment_day='$payment_day',payment_month='$payment_month', payment_year='$payment_year' where id ='$invoice_id'"
      );

         return back()->with('success','Update Information');
    }


    public function paymentedit(Request $request) {

       $id=  $request->input('inv_id');
       $des2=  $request->input('des2');
       $amount2=  $request->input('amount2');

       $invoice = Onlinepayment::find($id);
         $amount1=$invoice->amount1;

     
       $model = Onlinepayment::find($id);
       $model->des2=$des2;
       $model->amount2=$amount2;
       $model->payment=$amount1+$amount2;
       $model->update();   

       return back()->with('success','Description  Update Successfully');

    }


    public function onlinepaymentpdf(Request $request){
    
      $month=date('n',strtotime($_POST['month']));
      $year=date('Y',strtotime($_POST['month']));
      $monthyear=$request->input('month');
      $status=$request->input('status');
      $invoice=Onlinepayment::where('payment_month',$month)->where('payment_year',$year)->where('status',$status)->get();

      $file='Invoice-'.$monthyear.'.pdf';

      $data = [
           'title' => 'Welcome to OnlineWebTutorBlog.com',
           'invoice' => $invoice,
           'status' => $status,
           'monthyear' => $monthyear,
      ];
     
        
       $pdf=PDF::setPaper('a4', 'portrait')->loadView('pdf.onlinepaymentpdf',$data);
       //return $pdf->download($file);
       return  $pdf->stream($file,array('Attachment'=>false)); 

      // return view('pdf.seatplan',['student'=>$student]);
  }


   
}
