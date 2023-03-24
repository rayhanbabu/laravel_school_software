 @extends('admin/dashboardheader')
 @section('content')

  <div class="row mt-4 mb-0"> 
               <div class="col-3"> <h4 class="mt-0"> Mark Info : {{$class}} , {{$babu}}</h4></div>
                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                          <form method="post" action="{{url('admin/markimport')}}"  class="myform"  enctype="multipart/form-data" >
                             {!! csrf_field() !!}
                             <input type="hidden" name="class" class="form-control" value="{{$class}}">
                             <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
                             <input type="number" name="eiin" class="form-control" placeholder="Choice  EIIN No" required>
                             <input type="submit"   id="insert" value="Import Database" class="btn btn-success mx-3 mt-2"/>
                         </form>  
                      </div>
                     </div>

                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                          <form method="post" action="{{url('admin/markexcel')}}"  class="myform"  enctype="multipart/form-data" >
                             {!! csrf_field() !!}
                             <input type="hidden" name="class" class="form-control" value="{{$class}}">
                             <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
                             <input type="hidden" name="eiin" class="form-control" value="{{Session::get('admin')->eiin}}">
                             <input type="file" name="file" class="form-control">
                             <input type="submit"   id="insert" onclick="return confirm('Excel 1st 16 row must be exist some value empty value replace 0 value')" value="Import Excel" class="btn btn-success mx-3 mt-2"/>
                         </form>  
                      </div>
                     </div>

                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                          <form method="post" action="{{url('admin/markexport')}}"  class="myform"  enctype="multipart/form-data" >
                              {!! csrf_field() !!}
                             <input type="hidden" name="class" class="form-control" value="{{$class}}">
                             <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
                             <input type="hidden" name="eiin" class="form-control" value="{{Session::get('admin')->eiin}}">
                             <input type="submit"  id="insert" value="Export CSV" class="btn btn-success mx-3 mt-2"/>
                         </form>  
                      </div>
                     </div>

                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex ">
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Add
                        </button>
                      
                         </div>
                     </div> 
             </div>  
             <ol class="breadcrumb">
                  <li class="breadcrumb-item active">/Maiks Info</li>
             </ol>
             
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
              @endforeach
           </ul>
       </div>
     @endif
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
           <th width="5%" >Serial</th>
           <th width="5%" >EIIN</th>
           <th width="5%" >Class</th>
		   <th width="5%" >Group </th>
	       <th width="10%"> Start mark(>=)</th>
           <th width="5%" >End Mark(<)</th>
           <th width="5%" >(>=)Gpa</th>
           <th width="10%" >Grade</th>
           <th width="10%" >(<)Grade Range</th>
           <th width="5%" >Edit</th>
           <th width="5%" >Delete</th>
      </tr>
    </thead>
    <tbody>

	@foreach($markinfo as $row)
	 <tr>
          <td>{{$row->serial}}</td>
          <td>{{$row->eiin}}</td>
          <td>{{$row->class}}</td>
          <td>{{$row->babu}}</td>
          <td>{{$row->start}}</td>
          <td>{{$row->end}}</td>
          <td>{{$row->gpa}}</td>
          <td>{{$row->grade}}</td>
          <td>{{$row->gparange}}</td>
     <td>
      <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm edit" >Edit</button>
     </td>

     <td><a  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete  this row?')"  href="{{ url('admin/markdelete/'.$row->id)}}">Delete</a></td>

	</tr>
    @endforeach	 
	</tbody>
   </table>

  <script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "asc" ]] ,
	   "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
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
        <h5 class="modal-title" id="staticBackdropLabel"> Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/markinsert')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

       <div class="row px-3">

           <input type="hidden" name="class" class="form-control" value="{{$class}}">
           <input type="hidden" name="babu" class="form-control" value="{{$babu}}">


            <div class="col-lg-12 my-2">
                <label for="name">Serial No<span style="color:red;"> * </span></label>
                <input type="number" name="serial" id="serial" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
                <label for="name">Start Number(>=) <span style="color:red;"> * </span></label>
                <input type="number" name="start" id="start" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
               <label for="name">End Number(<) <span style="color:red;"> * </span></label>
               <input type="number" name="end" id="end" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
               <label for="name">Gpa(0.00) <span style="color:red;"> * </span></label>
               <input type="text" name="gpa" id="gpa" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
               <label for="name">Grade(A+) <span style="color:red;"> * </span></label>
               <input type="text" name="grade" id="grade" class="form-control" placeholder=""  required>
            </div>
            
            
             <div class="col-lg-6 my-2">
               <label for="name">Gpa Range(0.00) <span style="color:red;"> * </span></label>
               <input type="text" name="gparange" id="gparange" class="form-control" placeholder=""  required>
            </div>



         
       </div>     
      <input type="submit"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




 <!-- Modal  Edit -->
 <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subject Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/markupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

        <input type="hidden" name="class" class="form-control" value="{{$class}}">
           <input type="hidden" name="babu" class="form-control" value="{{$babu}}">


               <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>

               <div class="col-lg-12 my-2">
                <label for="name">Serial No<span style="color:red;"> * </span></label>
                <input type="number" name="serial" id="edit_serial" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
                <label for="name">Start Number(>=) <span style="color:red;"> * </span></label>
                <input type="number" name="start" id="edit_start" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
               <label for="name">End Number(<) <span style="color:red;"> * </span></label>
               <input type="number" name="end" id="edit_end" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
               <label for="name">Gpa(0.00) <span style="color:red;"> * </span></label>
               <input type="text" name="gpa" id="edit_gpa" class="form-control" placeholder=""  required>
            </div>


            <div class="col-lg-6 my-2">
               <label for="name">Grade(A+) <span style="color:red;"> * </span></label>
               <input type="text" name="grade" id="edit_grade" class="form-control" placeholder=""  required>
            </div>
            
            
             <div class="col-lg-6 my-2">
               <label for="name">Gpa Range(0.00) <span style="color:red;"> * </span></label>
               <input type="text" name="gparange" id="edit_gparange" class="form-control" placeholder=""  required>
            </div>
         
      </div>     
      <input type="submit"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3" />
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">

      $(document).ready(function(){
      $(document).on('click','.edit',function(){
             var edit_id = $(this).attr("id");  
             $('#editmodal').modal('show');
             $.ajax({
             type:'GET',
             url:'/admin/markview/'+edit_id,
             success:function(response){        
               // console.log(response.subject)
               $('#edit_id').val(response.subject.id)
               $('#edit_serial').val(response.subject.serial)
               $('#edit_start').val(response.subject.start)
               $('#edit_end').val(response.subject.end)
               $('#edit_gpa').val(response.subject.gpa)
               $('#edit_grade').val(response.subject.grade)
                $('#edit_gparange').val(response.subject.gparange)
          
                }
             }); 
      });

});
       
</script>
@endsection