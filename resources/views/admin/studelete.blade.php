@extends('admin/dashboardheader')
@section('content')

<div class="row mt-4 mb-0">
               <div class="col-4"> <h4 class="mt-0"> Student View , Section : {{$admin->admin_section}}</h4></div>
                     <div class="col-5">
                     <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                           Delete with Code Ma
                        </button>
                     </div>
                     </div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex ">
                         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Delete with Manual
                        </button>
                      
                         </div>
                     </div> 
             </div>  


             <div class="form-group  mx-2 my-2">
                           @if(Session::has('fail'))
                   <div  class="alert alert-danger"> {{Session::get('fail')}}</div>
                                @endif
                             </div>

                             <div class="form-group  mx-2 my-2">
                           @if(Session::has('success'))
                   <div  class="alert alert-success"> {{Session::get('success')}}</div>
                                @endif
                             </div> 
  
                        

<div class="card-block table-border-style">                     
 <div class="table-responsive">
  <table class="table table-bordered" id="employee_data">
    <thead>
      <tr>
           <th width="5%" >Code ma</th>
           <th width="5%" >Year</th>
           <th width="7%" >Exam </th>
           <th width="5%" >Stu Id</th>
	         <th width="5%" >Roll </th>
           <th width="5%" >Class</th>
           <th width="5%" >Group</th>
           <th width="5%" >Section</th>
           <th width="20%" >Name</th>
      </tr>
    </thead>
    <tbody>

	@foreach($student as $row)
	 <tr>
        <td>{{$row->codema}}</td>
        <td>{{$row->year}}</td>
        <td>{{$row->exam}}</td>
        <td>{{$row->stu_id}}</td>
        <td>{{$row->roll}}</td>
        <td>{{$row->class}}</td>
        <td>{{$row->babu}}</td>
        <td>{{$row->section}}</td>
        <td>{{$row->name}}</td>
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


<!-- Modal  ADD  -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/studelete')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="eiin" class="form-control" value="{{$admin->eiin}}" required>


          <div class="form-group  col-sm-6  my-2">
               <label class=""><b> Class </b></label>
               <select class="form-select" name="class"  aria-label="Default select example" required>
                    <option value="">Select</option>
                     @foreach($class as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Group</b></label>
               <select class="form-select" name="babu"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($group as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Section</b></label>
               <select class="form-select" name="section"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="A">A</option>
                     <option value="B">B</option>
                     <option value="C">C</option>
                     <option value="D">D</option>
           </select>
          </div>

         
      </div>     
      <input type="submit" onclick="return confirm('Are you sure you want to Delete  this Items?')"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal  ADD  -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/studeletema')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="eiin" class="form-control" value="{{$admin->eiin}}" required>


          <div class="form-group  col-sm-12  my-2">
               <label class=""><b> Enter Code Ma </b></label>
               <input type="text" name="codema" class="form-control" value="" required>
          </div>


          

         
      </div>     
      <input type="submit" onclick="return confirm('Are you sure you want to Delete  this Items?')"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




@endsection



