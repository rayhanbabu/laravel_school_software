<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
          <meta name="description" content=""/>
         <meta name="author" content="" />
        <title>ANCOVA Admin Panel</title>
      

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
        
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   

      
	    
    </head>
 
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-primary text-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-white"  href="#"  >ANCOVA Software</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                @if(Session::has('admin'))   
                {{Session::get('admin')->school}}, {{Session::get('admin')->eiin}}
                @endif            
                </div>
            </form>
            <!-- Navbar-->
           

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  Section- {{$admin->admin_section}} </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('adminsection/A') }}">Section: A</a></li>
                        <li><a class="dropdown-item" href="{{ url('adminsection/B') }}">Section: B</a></li>
                        <li><a class="dropdown-item" href="{{ url('adminsection/C') }}">Section: C</a></li>
                        <li><a class="dropdown-item" href="{{ url('adminsection/D') }}">Section: D</a></li>
                    </ul>
               </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a  class="dropdown-item" href="#!">Settings</a></li>
                        <li><a  class="dropdown-item" href="#">Password Change</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a  class="dropdown-item" href="{{ url('admin/logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
     <div class="sb-sidenav-menu">
       <div class="nav">
                           					   
     <a class="nav-link" href="{{url('admin/dashboard')}}">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard
     </a>
		
     <a class="nav-link" href="{{url('/examinfo')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
           Exam  Info
     </a>

     <a class="nav-link" href="{{url('/shiftinfo')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
           Shift  Info
     </a>


    
  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts12" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
         Interval Gpa Info 
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
  </a>
     <div class="collapse" id="collapseLayouts12" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
         <nav class="sb-sidenav-menu-nested nav">
           <a class="nav-link" href="{{url('markinfo/Six/NA')}}">Six</a>
           <a class="nav-link" href="{{url('markinfo/Seven/NA')}}">Seven</a>
           <a class="nav-link" href="{{url('markinfo/Eight/NA')}}">Eight</a>
           <a class="nav-link" href="{{url('markinfo/Nine/Science')}}">Nine Science</a>
           <a class="nav-link" href="{{url('markinfo/Nine/Humanities')}}">Nine Humanities</a>
           <a class="nav-link" href="{{url('markinfo/Nine/Commerce')}}">Nine Commerce</a>
           <a class="nav-link" href="{{url('markinfo/Ten/Science')}}">Ten Science</a>
           <a class="nav-link" href="{{url('markinfo/Ten/Humanities')}}">Ten Humanities</a>
           <a class="nav-link" href="{{url('markinfo/Ten/Commerce')}}">Ten Commerce</a>
         </nav>
    </div>
	


     <a class="nav-link" href="{{url('/paymentinfo')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
        Payment Info
     </a>
	
					

     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsstu" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Student Info
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
  </a>
   <div class="collapse" id="collapseLayoutsstu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
       <nav class="sb-sidenav-menu-nested nav">
          <a class="nav-link" href="{{url('/admin/stuview')}}"> Student Update </a>
          <a class="nav-link" href="{{url('/admin/studeleteview')}}"> Student Delete </a>
          <a class="nav-link" href="{{url('/admin/export')}}"> Student Export</a>
          <a class="nav-link" href="{{url('/admin/import')}}">  Student Import</a>
      </nav>
  </div>


  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsmark" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Student Mark Info
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
  </a>
   <div class="collapse" id="collapseLayoutsmark" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
           <a class="nav-link" href="{{url('marks/Six/NA')}}">Six</a>
           <a class="nav-link" href="{{url('marks/Seven/NA')}}">Seven</a>
           <a class="nav-link" href="{{url('marks/Eight/NA')}}">Eight</a>
           <a class="nav-link" href="{{url('marks/Nine/Science')}}">Nine Science</a>
           <a class="nav-link" href="{{url('marks/Nine/Humanities')}}">Nine Humanities</a>
           <a class="nav-link" href="{{url('marks/Nine/Commerce')}}">Nine Commerce</a>
           <a class="nav-link" href="{{url('marks/Ten/Science')}}">Ten Science</a>
           <a class="nav-link" href="{{url('marks/Ten/Humanities')}}">Ten Humanities</a>
           <a class="nav-link" href="{{url('marks/Ten/Commerce')}}">Ten Commerce</a>
       </nav>
  </div>

   <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsfin" aria-expanded="false" aria-controls="collapseLayouts">
       <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Finance  Info
       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
   </a>
   <div class="collapse" id="collapseLayoutsfin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
           <a class="nav-link" href="{{url('fins/Six/NA')}}">Six</a>
           <a class="nav-link" href="{{url('fins/Seven/NA')}}">Seven</a>
           <a class="nav-link" href="{{url('fins/Eight/NA')}}">Eight</a>
           <a class="nav-link" href="{{url('fins/Nine/Science')}}">Nine Science</a>
           <a class="nav-link" href="{{url('fins/Nine/Humanities')}}">Nine Humanities</a>
           <a class="nav-link" href="{{url('fins/Nine/Commerce')}}">Nine Commerce</a>
           <a class="nav-link" href="{{url('fins/Ten/Science')}}">Ten Science</a>
           <a class="nav-link" href="{{url('fins/Ten/Humanities')}}">Ten Humanities</a>
           <a class="nav-link" href="{{url('fins/Ten/Commerce')}}">Ten Commerce</a>
       </nav>
   </div>
  


    

        

  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Subject View
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
  </a>
   <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
       <nav class="sb-sidenav-menu-nested nav">
         <a class="nav-link" href="{{url('subject/Six/NA')}}">Six</a>
         <a class="nav-link" href="{{url('subject/Seven/NA')}}">Seven</a>
         <a class="nav-link" href="{{url('subject/Eight/NA')}}">Eight</a>
         <a class="nav-link" href="{{url('subject/Nine/Science')}}">Nine Science</a>
         <a class="nav-link" href="{{url('subject/Nine/Humanities')}}">Nine Humanities</a>
         <a class="nav-link" href="{{url('subject/Nine/Commerce')}}">Nine Commerce</a>
         <a class="nav-link" href="{{url('subject/Ten/Science')}}">Ten Science</a>
         <a class="nav-link" href="{{url('subject/Ten/Humanities')}}">Ten Humanities</a>
         <a class="nav-link" href="{{url('subject/Ten/Commerce')}}">Ten Commerce</a>
      </nav>
  </div>
  
        <a class="nav-link" href="{{url('/calculationinfo')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
         Result Calculation 
     </a>
	
		
  <a class="nav-link" href="{{url('/color/index')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
       Color View
     </a>


  </div>
 </div>
                   
 
 
<div class="sb-sidenav-footer">
     <div class="small">Logged in as:</div>
          ANCOVA
      </div>
   </nav>
</div>


<div id="layoutSidenav_content">
<main>

<div class="container-fluid px-3">
      <div>
     @yield('content')
     </div>
</div>    

    </main>
               
            </div>
        </div> 

       
       

        
        
    
    
    </body>
</html>
