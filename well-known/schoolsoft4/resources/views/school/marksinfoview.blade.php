@extends('school/schoolheader')
@section('marksinfoview','active')
@section('content')
         <h4 class="mt-4"> Marks Interval View , Class : {{$class}} , Section : {{$babu}} </h4>
             <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item active"></li>
            </ol>              

      <div class="card-block table-border-style">                     
       <div class="table-responsive">
         <table class="table table-bordered" id="employee_data">
            <thead>
               <tr>
                   <th width="5%" >Class</th>
		             <th width="5%" >Group </th>
	                <th width="10%"> From mark(>=)</th>
                   <th width="5%" >To Mark(<)</th>
                   <th width="5%" >Gpa</th>
                   <th width="10%" >Grade</th>
              </tr>
           </thead>
         <tbody> 
            @foreach($markinfo as $row)
               <tr>
                   <td>{{$row->class}}</td>
                   <td>{{$row->babu}}</td>
                   <td>{{$row->start}}</td>
                   <td>{{$row->end}}</td>
                   <td>{{$row->gpa}}</td>
                   <td>{{$row->grade}}</td>
              </tr>   
               @endforeach
	      </tbody>
      </table>

  <script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "asc" ]] ,
	   "lengthMenu": [[15, 50, 100, -1], [15, 50, 100, "All"]]
      }
	  );  
  });  
 </script>  
</div>
</div>
     

@endsection