<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaintainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SixController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\NineScController;
use App\Http\Controllers\TenScController;
use App\Http\Controllers\NineHuController;
use App\Http\Controllers\NineCoController;
use App\Http\Controllers\TenHuController;
use App\Http\Controllers\TenCoController;
use App\Http\Controllers\ThreeNaController;
use App\Http\Controllers\SixNaController;
use App\Http\Controllers\FourNaController;
use App\Http\Controllers\FiveNaController;
use App\Http\Controllers\SevenNaController;
use App\Http\Controllers\EightNaController;
use App\Http\Controllers\AdmitController;
use App\Http\Controllers\SeatplanController;
use App\Http\Controllers\TabulationController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\AttenController;
use App\Http\Controllers\PaymentinfoController;
use App\Http\Controllers\ExaminfoController;
use App\Http\Controllers\MarkinfoController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ExstudentController;
use App\Http\Controllers\SpendController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\OnlinepaymentController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\VedioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

   Route::get('/web/12345', [OnlinepaymentController::class,'onlinepaymentupdate']);

   Route::get('locale/{locale}',function($locale){
       Session::put('locale',$locale);
       return redirect()->back();
   });

   Route::get('/results/{eiin}/{exam}/{year}/{stu_id}', [TabulationController::class,'results']);
   Route::get('/resulterror/{eiin}/{exam}/{year}/{stu_id}', [TabulationController::class,'resulterror']);


    Route::middleware('MaintainAlready')->group(function(){
       Route::get('/maintain/login',[MaintainController::class,'loginview']);
       Route::post('maintain/login',[MaintainController::class,'login']);

    });

    Route::get('maintain/forget',[MaintainController::class,'forget']); 
    Route::post('maintain/forget',[MaintainController::class,'forgetemail']); 
    Route::post('maintain/forgetcode',[MaintainController::class,'forgetcode']); 
    Route::post('maintain/confirmpass',[MaintainController::class,'confirmpass']);
  
    Route::middleware('MaintainIs')->group(function(){

      // Login with session
      Route::get('/maintain/logout',[MaintainController::class,'logout']);
      Route::get('/maintain/dashboard',[MaintainController::class,'dashboard']);
      Route::get('/maintain/password',[MaintainController::class,'password']);
      Route::post('maintain/password',[MaintainController::class,'passwordedit']);

        Route::get('maintain/adminview',[MaintainController::class,'adminview']);
        Route::post('maintain/admininsert',[MaintainController::class,'admininsert']);
        Route::post('maintain/adminedit',[MaintainController::class,'adminedit']);
        Route::get('maintain/admindelete/{id}',[MaintainController::class,'admindelete']);
        Route::get('/maintain/adminlist/{status}/{id}',[MaintainController::class,'adminstatus']);
        Route::post('/maintain/adminpdf',[MaintainController::class,'adminpdf']);
        Route::get('/maintain/adminexport',[MaintainController::class,'adminexportview']);
        Route::post('/maintain/adminexport',[MaintainController::class,'adminexport']);
        Route::get('/maintain/adminimport',[MaintainController::class,'adminimportview']);
        Route::post('/maintain/adminimport',[MaintainController::class,'adminimport']);
        
        
        
            //Vedio information
            Route::get('/vedioinfo',[VedioController::class,'index']);
            Route::get('/vedioinfo/fetchall',[VedioController::class,'fetchAll']);
            Route::post('/vedioinfo/store',[VedioController::class,'store']);
            Route::get('/vedioinfo/edit',[VedioController::class, 'edit']);
            Route::post('/vedioinfo/update',[VedioController::class, 'update']);
            Route::delete('/vedioinfo/delete',[VedioController::class, 'delete']);



           //schoolview
           Route::get('maintain/schoolview',[SchoolController::class,'schoolview']);
           Route::post('maintain/schoolinsert',[SchoolController::class,'schoolinsert']);
           Route::get('maintain/schoolview/{id}',[SchoolController::class,'schoolviewid']);
           Route::post('maintain/schoolupdate',[SchoolController::class,'schoolupdate']);
           Route::get('maintain/schooldelete/{id}',[SchoolController::class,'schooldelete']);
           Route::get('/maintain/schoollist/{type}/{status}/{id}',[SchoolController::class,'schoolstatus']);
           Route::post('maintain/status',[SchoolController::class,'allschoolstatus']);
           Route::post('maintain/adminpass',[SchoolController::class,'adminpass']);


              // Exam View
             Route::get('maintain/examview',[ExamController::class,'examview']);
             Route::post('maintain/examinsert',[ExamController::class,'examinsert']);
             Route::get('maintain/examview/{id}',[ExamController::class,'examviewid']);
             Route::post('maintain/examupdate',[ExamController::class,'examupdate']);
             Route::get('maintain/examdelete/{id}',[ExamController::class,'examdelete']);


               //SMS information
              Route::get('maintain/sms',[SmsController::class,'index']);
              Route::get('/maintain/sms/fetchall',[SmsController::class,'fetchAll']);
              Route::post('/maintain/sms/store',[SmsController::class,'store']);
              Route::get('/maintain/sms/edit',[SmsController::class, 'edit']);
              Route::post('/maintain/sms/update',[SmsController::class, 'update']);
              Route::delete('/maintain/sms/delete',[SmsController::class, 'delete']);
              Route::post('/maintain/smspayment',[SmsController::class,'smspayment']);
              Route::get('/maintain/sms/{type}/{status}/{id}',[SmsController::class,'smsstatus']);
              Route::post('onlinesmspdf',[SmsController::class,'onlinesmspdf']);
              Route::get('maintain/smsdelete/{id}',[SmsController::class,'smsdelete']);

             
  
              //Payment information
              Route::get('maintain/payment',[OnlinepaymentController::class,'paymentview']);
              Route::get('/paymentprint/{id}', [OnlinepaymentController::class,'paymentprint']); 
              Route::post('/onlinepaymentstatus',[OnlinepaymentController::class,'onlinepaymentstatus']);
              Route::post('maintain/paymentedit',[OnlinepaymentController::class,'paymentedit']);
              Route::post('onlinepaymentpdf',[OnlinepaymentController::class,'onlinepaymentpdf']);
              Route::get('maintain/paymentdelete/{id}',[OnlinepaymentController::class,'paymentdelete']);
             
       });  


     Route::middleware('SchoolAlready')->group(function(){  
        Route::get('/schoollogin',[SchoolController::class,'loginview']);
        Route::post('schoollogin',[SchoolController::class,'schoollogin']);
     });


     Route::get('school/forget',[SchoolController::class,'forget']); 
     Route::post('school/forget',[SchoolController::class,'forgetemail']); 
     Route::post('school/forgetcode',[SchoolController::class,'forgetcode']); 
     Route::post('school/confirmpass',[SchoolController::class,'confirmpass']);
 


   Route::middleware('SchoolIs')->group(function(){

      Route::get('/payment_api',[SmsController::class,'payment_api']);

        Route::get('/schoollogout',[SchoolController::class,'schoollogout']);
       
        Route::get('/school/password',[SchoolController::class,'password']);
        Route::post('school/password',[SchoolController::class,'passwordedit']);

        Route::get('teacherview',[TeacherController::class,'teacherview']);
        Route::post('teacherinsert',[TeacherController::class,'teacherinsert']);
        Route::get('/teacheredit/{id}',[TeacherController::class,'teacheredit']);
        Route::post('teacherupdate',[TeacherController::class,'teacherupdate']);
        Route::get('teacherdelete/{id}',[TeacherController::class,'teacherdelete']);   
        Route::get('/vedioindex', [VedioController::class,'vedioindex']);


        


         //Teacher
         Route::get('teacher',[TeacherController::class,'teacher']);
         Route::get('school/manage_teacher',[TeacherController::class,'manage_teacher']);
         Route::get('school/manage_teacher/{id}',[TeacherController::class,'manage_teacher']);
         Route::post('school/teacher_product_process',[TeacherController::class,'teacher_product_process'])->name('teacher.insert');
         Route::get('teacher/delete/{id}',[TeacherController::class,'delete']);
         Route::get('/teacherlist/{type}/{status}/{id}',[TeacherController::class,'teacherstatus']);
         Route::post('teacherallstatus',[TeacherController::class,'teacherallstatus']);
         Route::get('teacher_attr_delete/{taid}/{id}',[TeacherController::class,'teacher_attr_delete']);


         //Atten school view
         Route::get('/attenview',[AttenController::class,'attenview']);
         Route::post('/pdf/atten',[AttenController::class,'attenpdf']);

           //Student View
          Route::get('student/{class}/{babu}', [StudentController::class,'student']);
          Route::post('/student/store', [StudentController::class,'store']);
          Route::get('/student/fetchall/{class}/{babu}',[StudentController::class,'fetchAll']);
          Route::get('/student/edit',[StudentController::class,'edit']);
          Route::post('/student/update',[StudentController::class,'update']);
          Route::delete('/student/delete',[StudentController::class,'delete']);


          //Ex-Student View
          Route::get('exstudent',[ExstudentController::class,'exstudent']);
          Route::post('/exstudent/store',[ExstudentController::class,'store']);
          Route::get('/exstudent/fetchall',[ExstudentController::class,'fetchAll']);
          Route::get('/exstudent/edit',[ExstudentController::class,'edit']);
          Route::post('/exstudent/update',[ExstudentController::class,'update']);
          Route::delete('/exstudent/delete',[ExstudentController::class,'delete']);

        
              //Admit View 
            Route::get('/admitindex',[AdmitController::class,'admitindex']);
            Route::get('/admit/fetchall',[AdmitController::class,'fetchAll']);
            Route::post('/admit/store',[AdmitController::class,'store']);
            Route::get('/admit/edit',[AdmitController::class, 'edit']);
            Route::post('/admit/update',[AdmitController::class, 'update']);
            Route::delete('/admit/delete',[AdmitController::class, 'delete']);


          //Class Routine View 
          Route::get('/routineindex', [RoutineController::class,'routineindex']);
          Route::get('/routine/fetchall',[RoutineController::class,'fetchAll']);
          Route::post('/routine/store',[RoutineController::class,'store']);
          Route::get('/routine/edit',[RoutineController::class,'edit']);
          Route::post('/routine/update',[RoutineController::class,'update']);
          Route::delete('/routine/delete',[RoutineController::class, 'delete']);
          Route::post('/routine',[RoutineController::class,'routine']);


            //SMS Send
            Route::get('/smsview', [SmsController::class,'smsview']); 
            Route::get('/smsbuy', [SmsController::class,'smsbuy']); 
            Route::get('/smsdetails', [SmsController::class,'smsdetails']); 
            Route::post('school/smsinsert', [SmsController::class,'smsinsert']); 
            Route::post('school/smstext_update', [SmsController::class,'smstext_update']); 
            Route::post('school/smsbuy', [SmsController::class,'smsbuyinsert']); 

            //Online Payment
            Route::get('/companypay', [OnlinepaymentController::class,'companypay']); 
            Route::get('/paymentprint/{id}', [OnlinepaymentController::class,'paymentprint']); 

            //Seatplan
            Route::get('/seatplanindex', [SeatplanController::class,'seatplanindex']);
            Route::post('/pdf/seatplan', [SeatplanController::class,'seatplan']);
 
            //Marks Input Form
            Route::get('/inputformindex', [SeatplanController::class,'inputformindex']);
            Route::post('/pdf/inputform', [SeatplanController::class,'inputform']);


           //Admit Pdf 
           Route::get('/admitpdf', [SeatplanController::class,'admitpdf']);
           Route::post('/pdf/admit', [SeatplanController::class,'admit']);


         //Tabulation Sheets Form
         Route::get('/tabulationindex',[TabulationController::class,'tabulationindex']);
         Route::post('/pdf/tabulation',[TabulationController::class,'tabulation']);

         //Marksheets 
         Route::get('/marksheetindex',[TabulationController::class,'marksheetindex']);
         Route::post('/pdf/marksheet',[TabulationController::class,'marksheet']);

         //Individual Result
         Route::get('/result',[TabulationController::class,'result']);

         //Result Summary 
         Route::get('/summaryindex', [TabulationController::class,'summaryindex']);
         Route::post('/pdf/summary', [TabulationController::class,'summary']);

         //Testimonial
         Route::get('/testimonialindex', [TabulationController::class,'testimonialindex']);
         Route::post('/pdf/testimonial', [TabulationController::class,'testimonial']);


          //result processing  Three Na
          Route::get('/Thr/Na/result',[ThreeNaController::class,'ThrNaresult']);
          Route::post('/Thr/Na/resultupdate',[ThreeNaController::class,'ThrNaresultupdate']);
          Route::post('/Thr/Na/resulttype',[ThreeNaController::class,'resulttype']);
          Route::get('/Thr/Na/subjectshow',[ThreeNaController::class,'ThrNasubjectshow']);
          Route::post('/Thr/Na/subjectupdate',[ThreeNaController::class,'ThrNasubjectupdate']); 

            //result processing  Four Na
            Route::get('/Fou/Na/result',[FourNaController::class,'FouNaresult']);
            Route::post('/Fou/Na/resultupdate',[FourNaController::class,'FouNaresultupdate']);
            Route::post('/Fou/Na/resulttype',[FourNaController::class,'resulttype']);
            Route::get('/Fou/Na/subjectshow',[FourNaController::class,'FouNasubjectshow']);
            Route::post('/Fou/Na/subjectupdate',[FourNaController::class,'FouNasubjectupdate']); 

            //result processing  Five Na
            Route::get('/Fiv/Na/result',[FiveNaController::class,'FivNaresult']);
            Route::post('/Fiv/Na/resultupdate',[FiveNaController::class,'FivNaresultupdate']);
            Route::post('/Fiv/resulttype',[FiveNaController::class,'resulttype']);
            Route::get('/Fiv/Na/subjectshow',[FiveNaController::class,'FivNasubjectshow']);
            Route::post('/Fiv/Na/subjectupdate',[FiveNaController::class,'FivNasubjectupdate']); 
        
         //result processing  Eight Na
         Route::get('/Eig/Na/result',[EightNaController::class,'EigNaresult']);
         Route::post('/Eig/Na/resultupdate',[EightNaController::class,'EigNaresultupdate']);
         Route::post('/Eig/Na/resulttype',[EightNaController::class,'resulttype']);
         Route::get('/Eig/Na/subjectshow',[EightNaController::class,'EigNasubjectshow']);
         Route::post('/Eig/Na/subjectupdate',[EightNaController::class,'EigNasubjectupdate']);

        //result processing  Seven Na
        Route::get('/Sev/Na/result',[SevenNaController::class,'SevNaresult']);
        Route::post('/Sev/Na/resultupdate',[SevenNaController::class,'SevNaresultupdate']);
        Route::post('/Sev/Na/resulttype',[SevenNaController::class,'resulttype']);
        Route::get('/Sev/Na/subjectshow',[SevenNaController::class,'SevNasubjectshow']);
        Route::post('/Sev/Na/subjectupdate',[SevenNaController::class,'SevNasubjectupdate']);

         //result processing  Six Na
         Route::get('/Six/Na/result',[SixNaController::class,'SixNaresult']);
         Route::post('/Six/Na/resultupdate',[SixNaController::class,'SixNaresultupdate']);
         Route::post('/Six/Na/resulttype',[SixNaController::class,'resulttype']);
         Route::get('/Six/Na/subjectshow',[SixNaController::class,'SixNasubjectshow']);
         Route::post('/Six/Na/subjectupdate',[SixNaController::class,'SixNasubjectupdate']);
  

         //result processing  Nine Science
         Route::get('/Nin/Sc/result',[NineScController::class,'NinScresult']);
         Route::post('/Nin/Sc/resultupdate',[NineScController::class,'NinScresultupdate']);
         Route::post('/Nin/Sc/resulttype',[NineScController::class,'resulttype']);
         Route::get('/Nin/Sc/subjectshow',[NineScController::class,'NinScsubjectshow']);
         Route::post('/Nin/Sc/subjectupdate',[NineScController::class,'NinScsubjectupdate']);

          //result processing  Nine Humanities
          Route::get('/Nin/Hu/result', [NineHuController::class,'NinHuresult']);
          Route::post('/Nin/Hu/resultupdate', [NineHuController::class,'NinHuresultupdate']);
          Route::post('/Nin/Hu/resulttype', [NineHuController::class,'resulttype']);
          Route::get('/Nin/Hu/subjectshow',[NineHuController::class,'NinHusubjectshow']);
          Route::post('/Nin/Hu/subjectupdate',[NineHuController::class,'NinHusubjectupdate']);

          //result processing  Nine Commerce
          Route::get('/Nin/Co/result', [NineCoController::class,'NinCoresult']);
          Route::post('/Nin/Co/resultupdate', [NineCoController::class,'NinCoresultupdate']);
          Route::post('/Nin/Co/resulttype', [NineCocontroller::class,'resulttype']);
          Route::get('/Nin/Co/subjectshow',[NineCoController::class,'NinCosubjectshow']);
          Route::post('/Nin/Co/subjectupdate',[NineCoController::class,'NinCosubjectupdate']);

           //result processing  Ten Science
           Route::get('/Ten/Sc/result', [TenScController::class,'TenScresult']);
           Route::post('/Ten/Sc/resultupdate', [TenScController::class,'TenScresultupdate']);
           Route::post('/Ten/Sc/resulttype', [TenScController::class,'resulttype']);
           Route::get('/Ten/Sc/subjectshow',[TenScController::class,'TenScsubjectshow']);
           Route::post('/Ten/Sc/subjectupdate',[TenScController::class,'TenScsubjectupdate']);

         //result  processing Ten Humanities
         Route::get('/Ten/Hu/result',[TenHuController::class,'TenHuresult']);
         Route::post('/Ten/Hu/resultupdate',[TenHuController::class,'TenHuresultupdate']);
         Route::post('/Ten/Hu/resulttype',[TenHuController::class,'resulttype']);
         Route::get('/Ten/Hu/subjectshow',[TenHuController::class,'TenHusubjectshow']);
         Route::post('/Ten/Hu/subjectupdate',[TenHuController::class,'TenHusubjectupdate']);

         //result processing  Ten Commerce
         Route::get('/Ten/Co/result', [TenCoController::class,'TenCoresult']);
         Route::post('/Ten/Co/resultupdate', [TenCoController::class,'TenCoresultupdate']);
         Route::post('/Ten/Co/resulttype', [TenCocontroller::class,'resulttype']);
         Route::get('/Ten/Co/subjectshow',[TenCoController::class,'TenCosubjectshow']);
         Route::post('/Ten/Co/subjectupdate',[TenCoController::class,'TenCosubjectupdate']);

          Route::get('colorview',[ColorController::class,'colorviewschool']);
          Route::get('colorview/{id}',[ColorController::class,'colorviewid']);
          Route::post('colorupdate',[ColorController::class,'colorupdate']);

          Route::get('subjectview/{class}/{babu}',[ColorController::class,'subjectview']);
          Route::get('markinfoview/{class}/{babu}',[ColorController::class,'markinfoview']);
 
 });

   
    Route::middleware('SchoolTeacher')->group(function(){   

        Route::get('dashboard',[SchoolController::class,'dashboard']);

          //Section
          Route::get('/schoolsection/{section}',[SchoolController::class,'schoolsection']);
        
          // Attendance
          Route::get('/atten',[AttenController::class,'index']);
          Route::post('/atten/insert',[AttenController::class,'store']);

          //Payment information with ipdate
          Route::get('/paymentinfoschool',[PaymentinfoController::class,'indexschool']);
          Route::get('/paymentview/{edit_id}',[PaymentinfoController::class, 'paymentview']);
          Route::post('/paymentinfoupdate',[PaymentinfoController::class,'paymentinfoupdate']); 
          Route::get('/monthly-invoice',[PaymentinfoController::class,'monthly_invoice']);
          Route::get('/monthlyview/{edit_id}',[PaymentinfoController::class,'monthlyview']);
          Route::post('/monthly-update',[PaymentinfoController::class,'monthly_update']);
          Route::post('/invoice/create',[PaymentinfoController::class,'invoice_create']);
          Route::get('/payment-details',[PaymentinfoController::class,'payment_details']);
          Route::get('/payment-details-fetch',[PaymentinfoController::class,'payment_details_fetch']);
          Route::get('/payment_fetch_data',[PaymentinfoController::class,'payment_fetch_data']);
          Route::get('/payment-data-view/{uid}',[PaymentinfoController::class,'payment_data_view']);
          Route::get('/payment-fetch/{uid}',[PaymentinfoController::class,'payment_fetch']);
          Route::post('/payment-create',[PaymentinfoController::class,'payment_create']);
          Route::post('/invoice-delete',[PaymentinfoController::class,'invoice_delete']);
          //pdf
          Route::get('/payment-summary',[PaymentinfoController::class,'payment_summary']);
          Route::post('/class-wise-pdf',[PaymentinfoController::class,'class_wise_pdf']);
          Route::post('/payment-month',[PaymentinfoController::class,'payment_month']);
          Route::post('/paymentday',[PaymentinfoController::class,'paymentday']);
          Route::post('/spend-month',[PaymentinfoController::class,'spend_month']);
          Route::post('/spendday',[PaymentinfoController::class,'spendday']);
          Route::post('/class-wise-payment',[PaymentinfoController::class,'class_wise_payment']);

          Route::get('/monthly-payment',[PaymentinfoController::class,'monthly_payment']);
          Route::post('/payment-update',[PaymentinfoController::class,'payment_update']);
         
         //Spend  View 
         Route::get('/spendindex', [SpendController::class,'spendindex']);
         Route::get('/spend/fetchall',[SpendController::class,'fetchAll']);
         Route::post('/spend/store',[SpendController::class,'store']);
         Route::get('/spend/edit',[SpendController::class, 'edit']);
         Route::post('/spend/update',[SpendController::class, 'update']);
         Route::delete('/spend/delete',[SpendController::class, 'delete']);


       //Three Na Marks Input
       Route::get('/ThrNainput', [ThreeNaController::class,'ThrNainput']);
       Route::get('/ThrNaSelect/{tecodesection}', [ThreeNaController::class,'ThrNaSelect']);  
       Route::get('/Thr/NA/sub11/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub12/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub13/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub14/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub15/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub16/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub17/{tecode}', [ThreeNaController::class,'ThrNasub']); 
       Route::get('/Thr/NA/sub18/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub19/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub20/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub21/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub22/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub23/{tecode}', [ThreeNaController::class,'ThrNasub']);
       Route::get('/Thr/NA/sub24/{tecode}', [ThreeNaController::class,'ThrNasub']);


       Route::post('Thr/Na/sub_update',[ThreeNaController::class,'ThrNasub_update']);
       Route::post('Thr/Na/sub_update12',[ThreeNaController::class,'ThrNasub_update12']);
       Route::post('Thr/Na/sub_update14',[ThreeNaController::class,'ThrNasub_update14']);
       Route::post('Thr/Na/sub_update16', [ThreeNaController::class,'ThrNasub_update16']);
       Route::post('Thr/Na/sub_update24', [ThreeNaController::class,'ThrNasub_update24']);

      //Four Na Marks Input
     Route::get('/FouNainput', [FourNaController::class,'FouNainput']);
     Route::get('/FouNaSelect/{tecodesection}', [FourNaController::class,'FouNaSelect']);  
     Route::get('/Fou/NA/sub11/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub12/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub13/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub14/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub15/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub16/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub17/{tecode}', [FourNaController::class,'FouNasub']); 
     Route::get('/Fou/NA/sub18/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub19/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub20/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub21/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub22/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub23/{tecode}', [FourNaController::class,'FouNasub']);
     Route::get('/Fou/NA/sub24/{tecode}', [FourNaController::class,'FouNasub']);


     Route::post('Fou/Na/sub_update',[FourNaController::class,'FouNasub_update']);
     Route::post('Fou/Na/sub_update12',[FourNaController::class,'FouNasub_update12']);
     Route::post('Fou/Na/sub_update14',[FourNaController::class,'FouNasub_update14']);
     Route::post('Fou/Na/sub_update16',[FourNaController::class,'FouNasub_update16']);
     Route::post('Fou/Na/sub_update24',[FourNaController::class,'FouNasub_update24']);

  

     //Five Na Marks Input
     Route::get('/FivNainput', [FiveNaController::class,'FivNainput']);
     Route::get('/FivNaSelect/{tecodesection}', [FiveNaController::class,'FivNaSelect']);  
     Route::get('/Fiv/NA/sub11/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub12/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub13/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub14/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub15/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub16/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub17/{tecode}', [FiveNaController::class,'FivNasub']); 
     Route::get('/Fiv/NA/sub18/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub19/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub20/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub21/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub22/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub23/{tecode}', [FiveNaController::class,'FivNasub']);
     Route::get('/Fiv/NA/sub24/{tecode}', [FiveNaController::class,'FivNasub']);


     Route::post('Fiv/Na/sub_update',[FiveNaController::class,'FivNasub_update']);
     Route::post('Fiv/Na/sub_update12',[FiveNaController::class,'FivNasub_update12']);
     Route::post('Fiv/Na/sub_update14',[FiveNaController::class,'FivNasub_update14']);
     Route::post('Fiv/Na/sub_update16', [FiveNaController::class,'FivNasub_update16']);
     Route::post('Fiv/Na/sub_update24', [FiveNaController::class,'FivNasub_update24']);
 
      //Six Na Marks Input
      Route::get('/SixNainput',[SixNaController::class,'SixNainput']);
      Route::get('/SixNaSelect/{tecodesection}',[SixNaController::class,'SixNaSelect']);
      Route::get('/Six/NA/sub11/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub12/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub13/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub14/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub15/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub16/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub17/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub18/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub19/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub21/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub22/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub23/{tecode}', [SixNaController::class,'SixNasub']);
      Route::get('/Six/NA/sub24/{tecode}', [SixNaController::class,'SixNasub']);
      

      Route::post('Six/Na/sub_update', [SixNaController::class,'SixNasub_update']);
      Route::post('Six/Na/sub_update12', [SixNaController::class,'SixNasub_update12']);
      Route::post('Six/Na/sub_update14', [SixNaController::class,'SixNasub_update14']);
      Route::post('Six/Na/sub_update16', [SixNaController::class,'SixNasub_update16']);
      Route::post('Six/Na/sub_update24', [SixNaController::class,'SixNasub_update24']);


       //Seven Na Marks Input
       Route::get('/SevNainput', [SevenNaController::class,'SevNainput']);
       Route::get('/SevNaSelect/{tecodesection}', [SevenNaController::class,'SevNaSelect']);
       Route::get('/Sev/NA/sub11/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub12/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub13/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub14/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub15/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub16/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub17/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub18/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub19/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub20/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub21/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub22/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub23/{tecode}', [SevenNaController::class,'SevNasub']);
       Route::get('/Sev/NA/sub24/{tecode}', [SevenNaController::class,'SevNasub']);
       

 
       Route::post('Sev/Na/sub_update', [SevenNaController::class,'SevNasub_update']);
       Route::post('Sev/Na/sub_update12', [SevenNaController::class,'SevNasub_update12']);
       Route::post('Sev/Na/sub_update14', [SevenNaController::class,'SevNasub_update14']);
       Route::post('Sev/Na/sub_update16', [SevenNaController::class,'SevNasub_update16']);
       Route::post('Sev/Na/sub_update24', [SevenNaController::class,'SevNasub_update24']);


      //Eight Na Marks Input
      Route::get('/EigNainput', [EightNaController::class,'EigNainput']);
      Route::get('/EigNaSelect/{tecodesection}', [EightNaController::class,'EigNaSelect']);
      Route::get('/Eig/NA/sub11/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub12/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub13/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub14/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub15/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub16/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub17/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub18/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub19/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub20/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub21/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub22/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub23/{tecode}', [EightNaController::class,'EigNasub']);
      Route::get('/Eig/NA/sub24/{tecode}', [EightNaController::class,'EigNasub']);
      

      Route::post('Eig/Na/sub_update', [EightNaController::class,'EigNasub_update']);
      Route::post('Eig/Na/sub_update16', [EightNaController::class,'EigNasub_update16']);
      Route::post('Eig/Na/sub_update24', [EightNaController::class,'EigNasub_update24']);
      

      
         //Nine Science  Marks Input
         Route::get('/NinScinput', [NineScController::class,'NinScinput']);
         Route::get('/NinScSelect/{tecodesection}', [NineScController::class,'NinScSelect']);
         Route::get('/Nin/Sc/sub11/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub12/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub13/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub14/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub15/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub16/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub17/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub18/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub19/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub20/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub21/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub22/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub23/{tecode}', [NineScController::class,'NinScsub']);
         Route::get('/Nin/Sc/sub24/{tecode}', [NineScController::class,'NinScsub']);
         
         Route::post('Nin/Sc/sub_update', [NineScController::class,'NinScsub_update']);
         Route::post('Nin/Sc/sub_update12', [NineScController::class,'NinScsub_update12']);
         Route::post('Nin/Sc/sub_update14', [NineScController::class,'NinScsub_update14']);
         Route::post('Nin/Sc/sub_update16', [NineScController::class,'NinScsub_update16']);
         Route::post('Nin/Sc/sub_update24', [NineScController::class,'NinScsub_update24']);

 
      //Nine Humanities Marks Input
      Route::get('/NinHuinput', [NineHuController::class,'NinHuinput']);
      Route::get('/NinHuSelect/{tecodesection}', [NineHuController::class,'NinHuSelect']);
      Route::get('/Nin/Hu/sub11/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub12/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub13/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub14/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub15/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub16/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub17/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub18/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub19/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub20/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub21/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub22/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub23/{tecode}', [NineHuController::class,'NinHusub']);
      Route::get('/Nin/Hu/sub24/{tecode}', [NineHuController::class,'NinHusub']);
      

      Route::post('Nin/Hu/sub_update', [NineHuController::class,'NinHusub_update']);
      Route::post('Nin/Hu/sub_update12', [NineHuController::class,'NinHusub_update12']);
      Route::post('Nin/Hu/sub_update14', [NineHuController::class,'NinHusub_update14']);
      Route::post('Nin/Hu/sub_update16', [NineHuController::class,'NinHusub_update16']);
      Route::post('Nin/Hu/sub_update24', [NineHuController::class,'NinHusub_update24']);
      
 
                //Nine Commerce Marks Input
        Route::get('/NinCoinput', [NineCoController::class,'NinCoinput']);
        Route::get('/NinCoSelect/{tecodesection}', [NineCoController::class,'NinCoSelect']);
        Route::get('/Nin/Co/sub11/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub12/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub13/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub14/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub15/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub16/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub17/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub18/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub19/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub20/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub21/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub22/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub23/{tecode}', [NineCoController::class,'NinCosub']);
        Route::get('/Nin/Co/sub24/{tecode}', [NineCoController::class,'NinCosub']);


        Route::post('Nin/Co/sub_update', [NineCoController::class,'NinCosub_update']);
        Route::post('Nin/Co/sub_update12', [NineCoController::class,'NinCosub_update12']);
        Route::post('Nin/Co/sub_update14', [NineCoController::class,'NinCosub_update14']);
        Route::post('Nin/Co/sub_update16', [NineCoController::class,'NinCosub_update16']);
        Route::post('Nin/Co/sub_update24', [NineCoController::class,'NinCosub_update24']);
      

         //Ten Science  Marks Input
           Route::get('/TenScinput', [TenScController::class,'TenScinput']);
           Route::get('/TenScSelect/{tecodesection}', [TenScController::class,'TenScSelect']);
           Route::get('/Ten/Sc/sub11/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub12/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub13/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub14/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub15/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub16/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub17/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub18/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub19/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub20/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub21/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub22/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub23/{tecode}', [TenScController::class,'TenScsub']);
           Route::get('/Ten/Sc/sub24/{tecode}', [TenScController::class,'TenScsub']);
           
   
           Route::post('Ten/Sc/sub_update', [TenScController::class,'TenScsub_update']);
           Route::post('Ten/Sc/sub_update12', [TenScController::class,'TenScsub_update12']);
           Route::post('Ten/Sc/sub_update14', [TenScController::class,'TenScsub_update14']);
           Route::post('Ten/Sc/sub_update16', [TenScController::class,'TenScsub_update16']);
           Route::post('Ten/Sc/sub_update24', [TenScController::class,'TenScsub_update24']);


      //Ten Humanities Marks Input
      Route::get('/TenHuinput', [TenHuController::class,'TenHuinput']);
      Route::get('/TenHuSelect/{tecodesection}', [TenHuController::class,'TenHuSelect']);
      Route::get('/Ten/Hu/sub11/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub12/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub13/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub14/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub15/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub16/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub17/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub18/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub19/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub20/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub21/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub22/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub23/{tecode}', [TenHuController::class,'TenHusub']);
      Route::get('/Ten/Hu/sub24/{tecode}', [TenHuController::class,'TenHusub']);
      

      Route::post('Ten/Hu/sub_update', [TenHuController::class,'TenHusub_update']);
      Route::post('Ten/Hu/sub_update12', [TenHuController::class,'TenHusub_update12']);
      Route::post('Ten/Hu/sub_update14', [TenHuController::class,'TenHusub_update14']);
      Route::post('Ten/Hu/sub_update16', [TenHuController::class,'TenHusub_update16']);
      Route::post('Ten/Hu/sub_update24', [TenHuController::class,'TenHusub_update24']);


      //Ten Commerce Marks Input
      Route::get('/TenCoinput', [TenCoController::class,'TenCoinput']);
      Route::get('/TenCoSelect/{tecodesection}', [TenCoController::class,'TenCoSelect']);
      Route::get('/Ten/Co/sub11/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub12/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub13/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub14/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub15/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub16/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub17/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub18/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub19/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub20/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub21/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub22/{tecode}', [TenCoController::class,'TenCosub']);
      Route::get('/Ten/Co/sub23/{tecode}', [TenCoController::class,'TenCosub']);
     Route::get('/Ten/Co/sub24/{tecode}', [TenCoController::class,'TenCosub']);


      Route::post('Ten/Co/sub_update', [TenCoController::class,'TenCosub_update']);
      Route::post('Ten/Co/sub_update12', [TenCoController::class,'TenCosub_update12']);
      Route::post('Ten/Co/sub_update14', [TenCoController::class,'TenCosub_update14']);
      Route::post('Ten/Co/sub_update16', [TenCoController::class,'TenCosub_update16']);
      Route::post('Ten/Co/sub_update24', [TenCoController::class,'TenCosub_update24']);


    });  


   Route::middleware('TeacherAlready')->group(function(){
      Route::get('/teacherlogin',[TeacherController::class,'loginview']);
      Route::post('teacherlogin',[TeacherController::class,'teacherlogin']);
   });  


  Route::middleware('TeacherIs')->group(function(){
    Route::get('/teacherlogout',[TeacherController::class,'teacherlogout']);
    Route::get('/teacher/teacher_password',[TeacherController::class,'password']);
    Route::post('teacher/teacher_password',[TeacherController::class,'passwordedit']);
  });  


   Route::middleware('AdminAlready')->group(function(){
       Route::get('/admin/login',[AdminController::class,'loginview']);
       Route::post('admin/login',[AdminController::class,'login']);
   });  



      Route::middleware('AdminIs')->group(function(){  
            Route::get('/admin/logout',[AdminController::class,'logout']);
            Route::get('/admin/dashboard',[adminController::class,'dashboard']);
            Route::get('/adminsection/{section}',[AdminController::class,'adminsection']);


       
              //Payment information
            Route::get('/paymentinfo',[PaymentinfoController::class,'index']);
            Route::get('/paymentinfo/fetchall',[PaymentinfoController::class,'fetchAll']);
            Route::post('/paymentinfo/store',[PaymentinfoController::class,'store']);
            Route::get('/paymentinfo/edit',[PaymentinfoController::class, 'edit']);
            Route::post('/paymentinfo/update',[PaymentinfoController::class, 'update']);
            Route::delete('/paymentinfo/delete',[PaymentinfoController::class, 'delete']);

             //Exam information
            Route::get('/examinfo',[ExaminfoController::class,'index']);
            Route::get('/examinfo/fetchall',[ExaminfoController::class,'fetchAll']);
            Route::post('/examinfo/store',[ExaminfoController::class,'store']);
            Route::get('/examinfo/edit',[ExaminfoController::class, 'edit']);
            Route::post('/examinfo/update',[ExaminfoController::class, 'update']);
            Route::delete('/examinfo/delete',[ExaminfoController::class, 'delete']);
            
            
             //Calculation information
             Route::get('/calculationinfo',[CalculationController::class,'index']);
             Route::get('/calculation/fetchall',[CalculationController::class,'fetchAll']);
             Route::post('/calculation/store',[CalculationController::class,'store']);
             Route::get('/calculation/edit/{class}/{babu}/{id}',[CalculationController::class, 'edit']);
             Route::post('/calculation/update',[CalculationController::class, 'update']);
             Route::delete('/calculation/delete',[CalculationController::class, 'delete']);
             Route::get('/calculation/des',[CalculationController::class, 'des']);
 

             //Shift information
             Route::get('/shiftinfo',[ShiftController::class,'index']);
             Route::get('/shiftinfo/fetchall',[ShiftController::class,'fetchAll']);
             Route::post('/shiftinfo/store',[ShiftController::class,'store']);
             Route::get('/shiftinfo/edit',[ShiftController::class, 'edit']);
             Route::post('/shiftinfo/update',[ShiftController::class, 'update']);
             Route::delete('/shiftinfo/delete',[ShiftController::class, 'delete']);
  


         // MArkInfo  View
         Route::get('markinfo/{class}/{babu}',[MarkinfoController::class,'markview']);
         Route::post('admin/markinsert',[MarkinfoController::class,'markinsert']);
         Route::get('admin/markview/{id}',[MarkinfoController::class,'markviewid']);
         Route::post('admin/markupdate',[MarkinfoController::class,'markupdate']);
         Route::get('admin/markdelete/{id}',[MarkinfoController::class,'markdelete']);
         Route::post('admin/markimport',[MarkinfoController::class,'markimport']);
         Route::post('admin/markexport',[MarkinfoController::class,'markexport']);
         Route::post('admin/markexcel',[MarkinfoController::class,'markexcel']);

         //Student  Marks  table View
         Route::get('marks/{class}/{babu}',[MarkController::class,'marksview']);
         Route::post('admin/marksupdate',[MarkController::class,'marksupdate']);
         Route::post('admin/marksdelete',[MarkController::class,'marksdelete']);
         Route::post('admin/marksstudent',[MarkController::class,'marksstudent']);
         Route::get('admin/marks/{id}',[MarkController::class,'markdelete']);


        //Student  Finance   table View
        Route::get('fins/{class}/{babu}',[InvoiceController::class,'finsview']);
        Route::post('admin/finsdelete',[InvoiceController::class,'finsdelete']);
        Route::post('admin/finsstudent',[InvoiceController::class,'finsstudent']);
 

       // Subject View
       Route::get('subject/{class}/{babu}',[SubjectController::class,'subjectview']);
       Route::post('admin/subjectinsert',[SubjectController::class,'subjectinsert']);
       Route::get('admin/subjectview/{id}',[SubjectController::class,'subjectviewid']);
       Route::post('admin/subjectupdate',[SubjectController::class,'subjectupdate']);
       Route::get('admin/subjectdelete/{id}',[SubjectController::class,'subjectdelete']);
       Route::post('admin/subimport',[SubjectController::class,'subimport']);
       Route::post('admin/subexport',[SubjectController::class,'subexport']);
       Route::post('admin/importexcel',[SubjectController::class,'importexcel']);

       //color view
       Route::get('color/index',[ColorController::class,'colorview']);
       Route::post('admin/colorinsert',[ColorController::class,'colorinsert']);
       Route::get('admin/colorview/{id}',[ColorController::class,'colorviewid']);
       Route::post('admin/colorupdate',[ColorController::class,'colorupdate']);
       Route::get('admin/colordelete/{id}',[ColorController::class,'colordelete']);
       Route::post('admin/colorimport',[ColorController::class,'colimport']);
       Route::post('admin/yearupdate',[AdminController::class,'yearupdate']);


       Route::get('admin/stuview',[AdminController::class,'stuview']);
       Route::post('admin/stuupdate',[AdminController::class,'stuupdate']);

       Route::get('admin/studeleteview',[AdminController::class,'studeleteview']);
       Route::post('admin/studelete',[AdminController::class,'studelete']);
       Route::post('admin/studeletema',[AdminController::class,'studeletema']);

       Route::get('admin/export',[AdminController::class,'export']);
       Route::post('admin/exports',[AdminController::class,'exports']);

       Route::get('admin/import',[AdminController::class,'import']);
       Route::post('admin/imports',[AdminController::class,'imports']);
      
    });


     Route::middleware('StudentAlready')->group(function(){
        Route::get('/student/login',[StudentController::class,'loginview']);
        Route::post('student/login',[StudentController::class,'login']);
     });  


    Route::middleware('StudentIs')->group(function(){    
      Route::get('/student/logout',[StudentController::class,'logout']);
      Route::get('student/dashboard',[StudentController::class,'dashboard']);
      Route::get('student/result',[StudentController::class,'result']);
      Route::get('student/payment',[StudentController::class,'payment']);
      Route::get('student/atten',[StudentController::class,'atten']);

    });


  Route::get('/', function () {
      return view('school.home');
  });

  Route::get('/test', [TabulationController::class,'test']);

  Route::get('/onlinepaymentupdate', [OnlinepaymentController::class,'onlinepaymentupdate']);
