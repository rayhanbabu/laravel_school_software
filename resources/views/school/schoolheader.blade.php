<?php
   use App\Models\Subject;
   use App\Models\Subjectauth;
   use App\Models\Onlinepayment;
   use App\Models\School;
   use Illuminate\Support\Facades\DB;
?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>   @if(Session::has('school')) {{Session::get('school')->school}} @else
                 {{Session::get('teacher')->name}} @endif
        </title>
      

        <link rel="stylesheet" href="{{asset('dashboardfornt/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('dashboardfornt/css/dataTables.bootstrap5.min.css')}}">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   
        <link rel='stylesheet'
         href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
        <link rel="icon" type="image/png" href="{{asset('images/ancovabr.png')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

      
      
   

        <script src="{{asset('dashboardfornt\js\jquery-3.5.1.js')}}"></script>
        <script src="{{asset('dashboardfornt\js\bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('dashboardfornt\js\jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('dashboardfornt\js\dataTables.bootstrap5.min.js')}}"></script>
        <script src="{{asset('dashboardfornt/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('dashboardfornt/js/scripts.js')}}"></script>
        
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


      
	    
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-primary text-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-white"  href="#"> </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order order-lg-0 me-5 me-lg-0 text-white" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                @if(Session::has('school'))   
                  {{Session::get('school')->school}}, EIIN: {{Session::get('school')->eiin}} 
                @endif
                @if(Session::has('teacher'))   
                   {{Session::get('teacher')->name}}, Teacher ID: {{Session::get('teacher')->teacher_userid}}
                @endif
                </div>
            </form>
            <!-- Navbar-->
           

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

            @if(Session::has('school'))
            
             <a class="btn btn-danger"  href="/vedioindex">Tutorial</a>
            
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  Section- {{Session::get('section')}} </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       @foreach(Session::get('sectionarr') as $list)  
                            <li><a class="dropdown-item" href="{{ url('schoolsection/'.$list->text1)}}">Section: {{$list->text1}}</a></li>
                        @endforeach
                     </ul>
                </li>
           

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ url('companypay')}}">Compmany Payment </a></li>
                          <li><a class="dropdown-item" href="{{ url('school/password')}}">Password Change</a></li>
                             <li><hr class="dropdown-divider"/> </li>
                          <li><a class="dropdown-item" href="{{ url('schoollogout')}}">Logout</a></li>
                      </ul>
                </li>

                @endif  
                @if(Session::has('teacher'))

                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  Section- {{Session::get('section')}} </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @foreach(Session::get('sectionarr') as $list)  
                        <li><a class="dropdown-item" href="{{ url('schoolsection/'.$list->text1)}}">Section: {{$list->text1}}</a></li>
                     @endforeach
                       </ul>
                   </li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                     
                        <li><a class="dropdown-item" href="{{ url('teacher/teacher_password')}}">Password Change</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ url('teacherlogout')}}">Logout</a></li>
                    </ul>
                </li>
                @endif  
                

            </ul>
        </nav>


<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
     <div class="sb-sidenav-menu">
       <div class="nav">

      
     
      @if(Session::has('school'))              					   
      <a class="nav-link @yield('dashboard')" href="{{url('dashboard')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
      </a>

   
     <a class="nav-link @yield('teacher')" href="{{url('/teacher')}}">
       <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
         Teacher info
     </a>



   <a class="nav-link @yield('smsview') @yield('smsbuy') @yield('smsdetails') collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseattansms" aria-expanded="false" aria-controls="collapseLayouts">
     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        SMS info
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
     </a>
       <div class="collapse" id="collapseattansms" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
         <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link @yield('smsview')" href="{{url('/smsview')}}">SMS Send</a>
            <a class="nav-link @yield('smsbuy')" href="{{url('smsbuy')}}"> SMS Buy</a>
            <a class="nav-link @yield('smsdetails')" href="{{url('smsdetails')}}"> SMS Details</a>
        </nav>
    </div>


   <a class="nav-link @yield('routineindex')" href="{{url('/routineindex')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
        Class Routine
   </a>
		
    
   <a class="nav-link @yield('studentindex') collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Student Entry
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
  </a>
   <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
       <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link @yield('ThreeNA')" href="{{url('student/Three/NA')}}"> Three </a>
          <a class="nav-link @yield('FourNA')" href="{{url('student/Four/NA')}}"> Four </a>
          <a class="nav-link @yield('FiveNA')" href="{{url('student/Five/NA')}}"> Five </a>
          <a class="nav-link @yield('SixNA')" href="{{url('student/Six/NA')}}"> Six </a>
          <a class="nav-link @yield('SevenNA')" href="{{url('student/Seven/NA')}}"> Seven </a>
          <a class="nav-link @yield('EightNA')" href="{{url('student/Eight/NA')}}"> Eight </a>
          <a class="nav-link @yield('NineScience')" href="{{url('student/Nine/Science')}}" > Nine Science </a>
          <a class="nav-link @yield('NineHumanities')" href="{{url('student/Nine/Humanities')}}"> Nine Humanities </a>
          <a class="nav-link @yield('NineCommerce')" href="{{url('student/Nine/Commerce')}}"> Nine Commerce </a>
          <a class="nav-link @yield('TenScience')" href="{{url('student/Ten/Science')}}"> Ten Science </a>
          <a class="nav-link @yield('TenHumanities')" href="{{url('student/Ten/Humanities')}}"> Ten Humanities </a>
          <a class="nav-link @yield('TenCommerce')" href="{{url('student/Ten/Commerce')}}"> Ten Commerce </a>
      </nav>
  </div>
	
 						
<a class="nav-link @yield('admitindex')" href="{{url('/admitindex')}}">
  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
   Exam Routine
</a>
		

<a class="nav-link @yield('admitpdf')" href="{{url('/admitpdf')}}">
  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
   Admit Card
</a>
 
<a class="nav-link @yield('seatplanindex')" href="{{url('/seatplanindex')}}">
  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Seat Plan
</a>

<a class="nav-link @yield('inputformindex')" href="{{url('/inputformindex')}}">
  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Input Form
</a>
			

  <a class="nav-link  collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseinput" aria-expanded="false" aria-controls="collapseLayouts">
   <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
      Marks Input
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
     <div class="collapse" id="collapseinput" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
      <nav class="sb-sidenav-menu-nested nav">
       <a class="nav-link" href="{{url('ThrNainput')}}">Three</a>
       <a class="nav-link" href="{{url('FouNainput')}}">Four</a>
       <a class="nav-link" href="{{url('FivNainput')}}">Five</a>
       <a class="nav-link" href="{{url('SixNainput')}}">Six</a>
       <a class="nav-link" href="{{url('SevNainput')}}">Seven</a>
       <a class="nav-link" href="{{url('EigNainput')}}">Eight</a>
       <a class="nav-link" href="{{url('NinScinput')}}">Nine Science</a>
       <a class="nav-link" href="{{url('NinHuinput')}}">Nine Humanities</a>
       <a class="nav-link" href="{{url('NinCoinput')}}">Nine Commerce</a>
       <a class="nav-link" href="{{url('TenScinput')}}">Ten Science</a>
       <a class="nav-link" href="{{url('TenHuinput')}}">Ten Humanities</a>
       <a class="nav-link" href="{{url('TenCoinput')}}">Ten Commerce</a>
     </nav>
  </div>



  <a class="nav-link @yield('atten') @yield('attenindex') collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseattan" aria-expanded="false" aria-controls="collapseLayouts">
   <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
      Attendance
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
     <div class="collapse" id="collapseattan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
      <nav class="sb-sidenav-menu-nested nav">
       <a class="nav-link @yield('atten')" href="{{url('atten')}}">Take Attendance</a>
       <a class="nav-link @yield('attenindex')" href="{{url('attenview')}}">Attendance View</a>
     
     </nav>
  </div>

   <a class="nav-link @yield('paymentinfo') @yield('monthly-invoice') @yield('payment-summary') @yield('payment-summary') collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsepayment" aria-expanded="false" aria-controls="collapseLayouts">
   <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Payment Info
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
       <div class="collapse" id="collapsepayment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
           <nav class="sb-sidenav-menu-nested nav">
               <a class="nav-link @yield('paymentinfo')" href="{{url('paymentinfoschool')}}">Payment Setup</a>
               <a class="nav-link @yield('monthly-invoice')" href="{{url('monthly-invoice')}}">Monthly  Invoice</a>
               <a class="nav-link @yield('payment-details')" href="{{url('payment-details')}}">Payment </a>
               <a class="nav-link @yield('payment-summary')" href="{{url('payment-summary')}}">Payment Summary </a>
               <a class="nav-link @yield('monthly-payment')" href="{{url('monthly-payment')}}">Payment Edit</a>
           </nav>
      </div>


     <a class="nav-link @yield('spend')" href="{{url('/spendindex')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
           Spend 
     </a>


   <a class="nav-link @yield('summaryindex')" href="{{url('/summaryindex')}}">
     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
       Result Summary
   </a>

  <a class="nav-link @yield('tabulationindex')" href="{{url('/tabulationindex')}}">
     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
      Tabulation Sheets
  </a>
  
															
  <a class="nav-link @yield('marksheetindex')" href="{{url('/marksheetindex')}}">
  <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
       Marksheets
   </a>	


   <a class="nav-link @yield('result')" href="{{url('/result')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
       Individual Result
   </a>	

   <a class="nav-link @yield('exstudent')" href="{{url('/exstudent')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
      Ex-Student
   </a>	

   <a class="nav-link @yield('testimonialindex')" href="{{url('/testimonialindex')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
      Testimonial
   </a>	

  


   <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
 <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    Setting
 <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
   </a>
   <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
   <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

   <a class="nav-link" href="{{url('/colorview')}}">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
      Color Setting
   </a>
   
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
            Subjects View
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
       <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
         <nav class="sb-sidenav-menu-nested nav">
             <a class="nav-link" href="{{url('subjectview/Six/NA')}}">Six</a>
             <a class="nav-link" href="{{url('subjectview/Seven/NA')}}">Seven</a>
             <a class="nav-link" href="{{url('subjectview/Eight/NA')}}">Eight</a>
             <a class="nav-link" href="{{url('subjectview/Nine/Science')}}">Nine Science</a>
             <a class="nav-link" href="{{url('subjectview/Nine/Humanities')}}">Nine Humanities</a>
             <a class="nav-link" href="{{url('subjectview/Nine/Commerce')}}">Nine Commerce</a>
             <a class="nav-link" href="{{url('subjectview/Ten/Science')}}">Ten Science</a>
             <a class="nav-link" href="{{url('subjectview/Ten/Humanities')}}">Ten Humanities</a>
             <a class="nav-link" href="{{url('subjectview/Ten/Commerce')}}">Ten Commerce</a>  
         </nav>
     </div>
 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
            Marks Interval View
  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
   <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
       <nav class="sb-sidenav-menu-nested nav">
           <a class="nav-link" href="{{url('markinfoview/Six/NA')}}">Six</a>
           <a class="nav-link" href="{{url('markinfoview/Seven/NA')}}">Seven</a>
           <a class="nav-link" href="{{url('markinfoview/Eight/NA')}}">Eight</a>
           <a class="nav-link" href="{{url('markinfoview/Nine/Science')}}">Nine Science</a>
           <a class="nav-link" href="{{url('markinfoview/Nine/Humanities')}}">Nine Humanities</a>
           <a class="nav-link" href="{{url('markinfoview/Nine/Commerce')}}">Nine Commerce</a>
           <a class="nav-link" href="{{url('markinfoview/Ten/Science')}}">Ten Science</a>
           <a class="nav-link" href="{{url('markinfoview/Ten/Humanities')}}">Ten Humanities</a>
           <a class="nav-link" href="{{url('markinfoview/Ten/Commerce')}}">Ten Commerce</a>
      </nav>
   </div> 
  </nav>
 </div>
			
      @endif   
    @if(Session::has('teacher'))  
  
   <?php 

      function tlink($tcode){
           $linkurl='/'.substr($tcode,0,3).'/'.substr($tcode,3,2)
                 .'/'.substr($tcode,5,5).'/'.$tcode;
             return $linkurl;
       }

        function showsubject($tcode){ 
            $sub1 =Subject::where('tecode',substr($tcode,0,10))->where('eiin',Session::get('teacher')->eiin)->first();
             $subject=$sub1->class.' '.$sub1->babu.' '.substr($tcode,10,1).' '.$sub1->subject;
            return $subject;
         }

       $data=Subjectauth::where('teacher_id',Session::get('teacher')->id)->get();
       $fin=DB::table('faaccess')->where('category','Fin')->where('teacher_id',Session::get('teacher')->id)->get();
   ?>


 <a class="nav-link" href="{{ url('dashboard')}}">
     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
      Dashboard
  </a>
     @if(Session::get('teacher')->atten_class)
       <a class="nav-link" href="{{ url('atten')}}">
           <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
               Take Attendance
       </a>
     @endif
       <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsefin" aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Payment 
           <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
       </a>
         <div class="collapse" id="collapsefin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                 @foreach($fin as $row)
                       <a class="nav-link" href="{{url('payment-details?class='.$row->class.'&babu='.$row->babu.'&section='.$row->section.'&facode='.$row->facode)}}">
                           {{$row->class}}-{{$row->babu}}-{{$row->section}}
                      </a>
                  @endforeach  
                <a class="nav-link @yield('payment-summary')" href="{{url('payment-summary')}}">Payment Summary </a>
             </nav>
         </div>

      




    


      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsepayment" aria-expanded="false" aria-controls="collapseLayouts">
      <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
       Marks Input
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
     </a>
        <div class="collapse" id="collapsepayment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
           <nav class="sb-sidenav-menu-nested nav">
                @foreach($data as $row)
                      <a class="nav-link" href="{{tlink($row->tecode)}}">
                           {{showsubject($row->tecode)}}
                      </a>
                 @endforeach     
            </nav>
        </div>

   

  

  

  


 

 

@endif
							


  </div>
 </div>
                   
 
 
<div class="sb-sidenav-footer">
     <div class="small">Developed By:</div>
          ANCOVA
      </div>
   </nav>
</div>


<div id="layoutSidenav_content">
<main>

<div class="container-fluid px-3">
    
     <?php
           if(Session::has('school')){ 
               $school=School::where('eiin',Session::get('school')->eiin)->first();
            }else if(Session::has('teacher')){
               $school=School::where('eiin',Session::get('teacher')->eiin)->first();
           }

     $paydata=Onlinepayment::where('eiin',$school->eiin)->orderBy('id','desc')->first();
     $status=strtotime(date("Y-m-d"))-strtotime(date("Y-m-d",strtotime($school->created_date.$school->payment_duration."month")));
      
      ?>
    
    @if(Session::has('school')) 
      <?Php 
      $paydata=Onlinepayment::where('eiin',Session::get('school')->eiin)->orderBy('id','desc')->first();
      if($paydata->status!=1){
          if(strtotime(date("Y-m-d"))-strtotime(date("Y-m-d",strtotime($school->created_date.$school->payment_duration."day")))>=0){                 
             echo'<p class="text-danger text-center my-2">Please Payment between '.date("d-M-Y",strtotime($school->created_date.$school->payment_duration."month")).' <a class="btn btn-warning sm" href="/companypay" role="button">Pay Now</a> <p>';            
          }
        }
       ?>
     @endif

     
 


        @if($paydata->status!=1)
             @if($status>0)
                @yield('contentpayment')
             @else
                @yield('content')
                @yield('contentpayment')
             @endif
         @else
               @yield('content')
               @yield('contentpayment')

          @endif


  </div>    

    </main>
               
            </div>
        </div> 

       
       

        
        
    
    
    </body>
</html>
