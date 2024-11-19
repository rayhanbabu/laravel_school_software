@extends('school/schoolheader')
@section('dashboard','active')
@section('content')

@if(Session::has('school'))  
                        <h4 class="mt-4">Dashboard ,  Section : {{Session::get('section')}} </h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> Three  <b> {{student('Three','Na',Session::get('section'))->count()}} </b> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Three/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">                            
                                    <div class="card-body"> Four  <b>  {{student('Four','Na',Session::get('section'))->count()}} </b>  </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Four/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>                           
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> Five <b>  {{student('Five','Na',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Five/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                        
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> Six  <b> {{student('Six','Na',Session::get('section'))->count()}} </b> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Six/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">                            
                                    <div class="card-body"> Seven  <b>  {{student('Seven','Na',Session::get('section'))->count()}} </b>  </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Seven/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>                           
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> Eight <b>  {{student('Eight','Na',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Eight/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"> Nine  <b>  {{student('Nine','NA',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Nine/NA')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"> Nine Science <b>  {{student('Nine','Science',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Nine/Science')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
						 <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> Nine Humanities <b>  {{student('Nine','Humanities',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Nine/Humanities')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"> Nine Commerce <b>  {{student('Nine','Commerce',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Nine/Commerce')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> Ten Scienc <b>  {{student('Ten','Science',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Ten/Science')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Ten Humanities <b>  {{student('Ten','Humanities',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Ten/Humanities')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                         <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Ten Commerce <b>  {{student('Ten','Commerce',Session::get('section'))->count()}} </b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{url('student/Ten/Commerce')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Student   <b>{{$total}}</b></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                           </div>	


 <h3>Current Exam Information</h3>
  <div class="card-block table-border-style">                     
   <div class="table-responsive">
     <table class="table table-bordered" id="employee_data">
    <thead>
             <tr>
                   <th>Class</th>
                   <th>Group</th>
                   <th>Exam</th>
                   <th>Year </th>
             </tr>
    </thead>
    <tbody> 
            @foreach($examinfo as $row)
             <tr>
                  <td>{{$row->class}}</td>
                  <td>{{$row->babu}}</td>
                  <td>{{examName($row->exam)}}</td>
                  <td>{{$row->year}}</td>
            </tr>   
            @endforeach
	
	</tbody>
   </table>

  <script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "asc" ]] ,
	   "lengthMenu": [[15, 50, 100, -1], [10, 50, 100, "All"]]
      }
	  );  
  });  
 </script>  
</div>
</div>





                 @else
                  <h2 class="mt-4">Welcome , {{Session::get('teacher')->name}} Sir</h2>
                  <h3>Please Input Marks Your Access Subjects </h3>

               
               @endif

@endsection