@extends('school/schoolheader')
@section('subjectview','active')
@section('content')

             <h4 class="mt-4">Subject View , Class : {{$class}}, Section : {{$babu}} </h4>
                 <ol class="breadcrumb mb-4">
                      <li class="breadcrumb-item active"></li>
                 </ol>              

      <div class="card-block table-border-style">                     
       <div class="table-responsive">
         <table class="table table-bordered" id="employee_data">
            <thead>
               <tr>
                 <th width="5%" > Class</th>
                 <th width="5%" > Group</th>
                 <th width="10%"> Subject</th>
                 <th width="5%" > Total Mark</th>
                 <th width="5%" > CQ, MCQ, Pra status</th>
                 <th width="5%" > CQ, MCQ, Pra Individual Mark</th>
                 <th width="5%" > CQ, MCQ, Pra Fail</th>
              </tr>
           </thead>
         <tbody> 
            @foreach($subject as $row)
               <tr>
                   <td>{{$row->class}}</td>
                   <td>{{$row->babu}}</td>
                   <td>{{$row->subject}}</td>
                   <td>{{$row->tmark}}</td>
                   <td>{{$row->cstatus}}, {{$row->mstatus}}, {{$row->pstatus}}</td>
                   <td>{{$row->cmark}}, {{$row->mmark}}, {{$row->pmark}}</td>
                   <td>{{$row->cfail}}, {{$row->mfail}}, {{$row->pfail}}</td>
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





            

@endsection