
<!doctype html>
<html lang="en">
<head>
  <title>ANCOVA</title>
    <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="{{asset('dashboardfornt\css\login.css')}}">
       <link rel="icon" type="image/png" href="{{ asset('images/ancovabr.png') }}">

	</head>
	<script>
	    function showpass()
		{
		   var pass = document.getElementById('pass');
		   if(document.getElementById('check').checked)
		   {
		     pass.setAttribute('type','text');
		   }
		   else{
		     pass.setAttribute('type','password'); 
		   }
		}
	 </script>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		         <a target="_blank" href="http://ancovabd.com/"><img src="{{ asset('images/ancovabr.png') }}" alt="Denim Jeans" width="150" style="margin-top:-20px;"></a>
				<h5>School Management Software</h5>
		      	<h4 class="text-center my-2"><a href="{{url('schoollogin')}}">School Login</a></h4>
                <h4 class="text-center my-2"><a href="{{url('teacherlogin')}}">Teacher Login</a></h4>
				<h4 class="text-center my-2"><a href="{{url('student/login')}}">Student Login</a></h4>
                <h5  target="_blank" class="text-center my-2" ><a href="{{url('https://www.youtube.com/watch?v=F0aqoIru19o')}}">Software Customize Tutorial </a></h5>
                <h5>Contact Us</h5>
                <p>99, Nazimuddin Road Boro Jame Masjid Chankharpul, Dhaka<br>
                Mobile : 01750360044<br>
                E-mail : contact@ancovabd.com<br>
                Website:<a target="_blank" href="http://ancovabd.com/">www.ancovabd.com</a></p>
						
	        </div>
				</div>
			</div>
		</div>
	</section>


	</body>
</html>
