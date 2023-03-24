@extends('school/schoolheader')
@section('teacher','active')
@section('content')

        <div class="row mt-4 mb-0">
               <div class="col-6"> <h4 class="mt-0">Teacher Information with Teaching Subject</h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                             <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#statusmodal">
                          All Status
                        </button>
                              
                         </div>
                     </div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex ">
                         <a class="btn btn-primary" href="{{url('school/manage_teacher')}}" role="button">Add</a>
                             
                         </div>
                     </div>   
             </div>  

             @if(Session::has('message'))
                 <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                          {{Session('message')}}
									</div>
                @else
             @endif


                <ol class="breadcrumb ">
                     <li class="breadcrumb-item active">/Teacher Info</li>
                 </ol>
            

 <div class="card-block table-border-style">                     
 <div class="table-responsive">
 <table class="table table-bordered" id="employee_data">
    <thead>
      <tr>
           <th width="10%" >Teacher Name</th>
	    	<th width="10%" >Designation</th>
	        <th width="15%" >Email</th>
           <th width="15%" > Phone(88)</th>
           <th width="15%" >Teacher Id</th>
           <th width="15%" >Password</th>
           <th width="5%" >Status</th>
           <th width="15%">Action </th>
           
      </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
             <tr>
                      <td>{{$row->name}}</td>
                      <td>{{$row->desig}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->phone}}</td>
                      <td>{{$row->teacher_userid}}</td>
                      <td>{{$row->teacher_password}}</td>
                      <td>
              @if($row->status == 1)         
            <a href="{{ url('/teacherlist/status/deactive/'.$row->id) }}" class="btn btn-success btn-sm" >Active<a>     
            @else
              <a href="{{ url('/teacherlist/status/active/'.$row->id) }}" class="btn btn-danger btn-sm" >Deactive<a>       
               @endif
          </td>
                      <td>

                   <a class="btn btn-success btn-sm"  href="{{url('school/manage_teacher/'.$row->id)}}" role="button">Edit/View</a>
              
                  <a class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure you want to Delete  this Items?')" href="{{url('teacher/delete/'.$row->id)}}" role="button">Delete</a>
        
                      </td>
           </tr>                           
     @endforeach                                                
	     
	</tbody>
  </table>

  <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "desc" ]] ,
		"lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
      }
	  );  
 });  
 </script>  
</div>
</div>




<!-- Modal Status -->
<div class="modal fade" id="statusmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Status Change</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="post" action="{{url('teacherallstatus')}}"  class="myform"  enctype="multipart/form-data" >
         {!! csrf_field() !!}

        <div class="form-group  mb-4">
        <label class=""><b>Status</b></label>
          <select class="form-select"  name="status" aria-label="Default select example" required>
                 <option value="">Select One</option>
                 <option value="1">Active</option>
                 <option value="0">Deactive</option> 
           </select>
       </div>   

    <input type="submit"   id="insert" value="Update" class="btn btn-success" />
	  
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





@endsection     
