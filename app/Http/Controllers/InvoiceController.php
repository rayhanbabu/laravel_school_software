<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Student;
use App\Models\Examinfo;
use App\Models\Exam;
use App\Models\Paymentinfo;
use DB;
use Hash;
use Mail;
use Session;
use PDF;

class InvoiceController extends Controller
{
   
    public function finsview($class,$babu)
      {
            $admin=adminsession();
            $paymentinfo = Paymentinfo::where('section',$admin->admin_section)->where('babu',$babu)->where('class',$class)->where('eiin',$admin->eiin)->first();  
            $year=Exam::where('babu','year')->orderBy('serial','asc')->get();
            $exam=Exam::where('babu','exam')->orderBy('serial','asc')->get();
            $classarr=Exam::where('babu','class')->orderBy('serial','asc')->get();
            $group=Exam::where('babu','group')->orderBy('serial','asc')->get();
        

            $invoice=DB::table('invoices')
                ->leftjoin('students', 'students.id', '=', 'invoices.uid')
               ->where('invoices.section',$admin->admin_section)
               ->where('invoices.invoice_month',$paymentinfo->month)->where('invoices.invoice_year',$paymentinfo->year)
               ->where('invoices.eiin',$admin->eiin)->where('invoices.class',$class)->where('invoices.babu',$babu)
               ->select('students.name','students.stu_id','students.roll','students.moral','students.main'
                ,'students.image','students.addi','invoices.*')
               ->orderBy('students.roll','asc')->get();
             return view('admin.finview',['admin'=>$admin,'invoice'=>$invoice,'exam'=>$exam,'year'=>$year,'classarr'=>$classarr,'group'=>$group]);
         }


         public function finsdelete(Request $request){
             $babu=$request->input('babu');
             $class=$request->input('class');
             $section=$request->input('section');
             $eiin=$request->input('eiin');
             $month=date('n',strtotime($_POST['month']));
             $year=date('Y',strtotime($_POST['month']));
     
               DB::delete(
                   "delete from invoices where eiin='$eiin' AND invoice_month='$month' 
                    AND invoice_year='$year' 
                    AND babu='$babu' AND class='$class' AND section='$section' "
                  );  
               return redirect()->back()->with('success','Data Deleted Successfull');  
            }


            public function finsstudent(Request $request){

              $admin=adminsession();
              $class=$request->input('class');
              $babu=$request->input('babu');
              $section=$request->input('section');
              $month=date('n',strtotime($_POST['month']));
              $year=date('Y',strtotime($_POST['month']));
          
               $paymentinfo=Paymentinfo::where('section',$section)->where('babu',$babu)
                   ->where('class',$class)->where('eiin',$admin->eiin)->first();  
          
               $student=Student::where('section',$section)->where('babu',$babu)->where('class',$class)
                ->where('eiin',$admin->eiin)->get();
          
                $tstudent=Invoice::where('section',$section)->where('babu',$babu)->where('class',$class)
                ->where('invoice_month', $month)->where('invoice_year',$year)->where('eiin',$admin->eiin)->orderBy('id','desc')->get();
              
                // return $paymentinfo;
                 //die();
                 
             if($student){
              if($tstudent->count()<=0){
                   foreach($student as $row){     
                        $model= new Invoice;
                        $model->eiin=$admin->eiin;
                        $model->class=$class;
                        $model->babu=$babu;
                        $model->section=$section;
                        $model->invoice_date=$paymentinfo->date;
                        $model->invoice_month=$paymentinfo->month;
                        $model->invoice_year=$paymentinfo->year;
                        $model->des1=$paymentinfo->des1;
                        $model->des2=$paymentinfo->des2;
                        $model->des3=$paymentinfo->des3;
                        $model->des4=$paymentinfo->des4;
                        $model->des5=$paymentinfo->des5;
                        $model->des6=$paymentinfo->des6;
                       
                        $model->amount1=$paymentinfo->amount1;
                        $model->amount2=$paymentinfo->amount2;
                        $model->amount3=$paymentinfo->amount3;
                        $model->amount4=$paymentinfo->amount4;
                        $model->amount5=$paymentinfo->amount5;
                        $model->amount6=$paymentinfo->amount6;
                        $model->totalamount=$paymentinfo->amount1+$paymentinfo->amount2
                                           +$paymentinfo->amount3+$paymentinfo->amount4
                                           +$paymentinfo->amount5+$paymentinfo->amount6;
                        $model->uid=$row['id'];
                        $model->save();
                    } 
          
                       return redirect()->back()->with('success','Data Updated Successfull');
                  }else{
                      return redirect()->back()->with('fail','From Information  exist To information');
                  }
                     
                 }else{
                  return redirect()->back()->with('fail','No Data Found From Information ');
                 }
             }
          
          

}
