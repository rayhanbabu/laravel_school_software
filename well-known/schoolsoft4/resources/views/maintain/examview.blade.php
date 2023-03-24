@extends('maintain/dashboardheader')
@section('content')

<div class="row mt-4 mb-0">
               <div class="col-6"> <h4 class="mt-0">Exam, Year Information</h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                             
                              
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
             <ol class="breadcrumb ">
                            <li class="breadcrumb-item active">/Subject Info</li>
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
             <th width="5%">Serial</th>
		         <th width="5%">Category</th>
	           <th width="10%">Text1</th>
             <th width="10%">Text2</th>
             <th width="10%">Text3</th> 
             <th width="10%">Text4</th>
             <th width="5%">Edit</th>
             <th width="5%">Delete</th>
      </tr>
    </thead>
    <tbody>

	@foreach($exam as $row)
	    <tr>
          <td>{{$row->serial}}</td>
          <td>{{$row->babu}}</td>
          <td>{{$row->text1}}</td>
          <td>{{$row->text2}}</td>
          <td>{{$row->text3}}</td>
          <td>{{$row->text4}}</td>
       <td>
      <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm edit" >Edit</button>
     </td>

     <td><a  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete  this row?')"  href="{{ url('maintain/examdelete/'.$row->id)}}">Delete</a></td>

	</tr>
    @endforeach	 
	</tbody>
   </table>

  <script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
           "order": [[ 1, "asc" ]] ,
	  	"lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
      }
	  );  
  });  
 </script>  

</div>
</div>


  <!-- Modal  ADD-->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subject Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('maintain/examinsert')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

        

         <div class="form-group col-sm-6  my-2">
               <label class=""><b>Serial<span style="color:red;"> * </span></b></label>
               <input type="number" name="serial" class="form-control" required>
          </div> 
			

          <div class="form-group col-sm-6  my-2">
             <label class=""><b>Category<span style="color:red;"> * </span></b></label>
                <select class="form-select" name="babu"  aria-label="Default select example" required>
                      <option value="">Select</option>
                      <option value="exam">exam</option>
                      <option value="year">year</option>
                      <option value="class">class</option>
                      <option value="group">group</option>
                      <option value="subject">subject</option>
                      <option value="shortsubject">shortsubject</option>
                      <option value="section">section</option>
                      <option value="other1">other1</option>
                      <option value="other2">other2</option>    
                      <option value="sms">sms</option>        
                </select>
          </div>


          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 1<span style="color:red;"> * </span></b></label>
               <input type="text" name="text1" class="form-control" required>
          </div> 

          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 1<span style="color:red;"> * </span></b></label>
               <input type="text" name="text2" class="form-control" required>
          </div> 

          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 1</b></label>
               <input type="text" name="text3" class="form-control" >
          </div> 

          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 1</b></label>
               <input type="text" name="text4" class="form-control" >
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




<!-- Modal  Edit -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subject Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('maintain/examupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

               <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>

               <div class="form-group col-sm-6  my-2">
               <label class=""><b>Serial<span style="color:red;"> * </span></b></label>
               <input type="number" name="serial" id="edit_serial" class="form-control" required>
          </div> 
			

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Category<span style="color:red;"> * </span></b></label>
               <select class="form-select" name="babu" id="edit_babu"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="exam">exam</option>
                     <option value="year">year</option>
                     <option value="class">class</option>
                     <option value="group">group</option>
                     <option value="subject">subject</option>
                     <option value="shortsubject">shortsubject</option>
                     <option value="other1">other1</option>
                     <option value="other2">other2</option>
                     <option value="sms">sms</option>      
         </select>
      </div>


          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 1<span style="color:red;"> * </span></b></label>
               <input type="text" name="text1" id="edit_text1" class="form-control" required>
          </div> 

          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 2<span style="color:red;"> * </span></b></label>
               <input type="text" name="text2" id="edit_text2" class="form-control" required>
          </div> 

          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 3</b></label>
               <input type="text" name="text3" id="edit_text3" class="form-control" >
          </div> 

          <div class="form-group col-sm-6 my-2">
               <label class=""><b>Text 4</b></label>
               <input type="text" name="text4" id="edit_text4" class="form-control" >
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
             url:'/maintain/examview/'+edit_id,
             success:function(response){        
               // console.log(response.subject)
               $('#edit_id').val(response.exam.id)
               $('#edit_serial').val(response.exam.serial)
               $('#edit_babu').val(response.exam.babu)
               $('#edit_text1').val(response.exam.text1)
               $('#edit_text2').val(response.exam.text2)
               $('#edit_text3').val(response.exam.text3)
               $('#edit_text4').val(response.exam.text4)
                }
             }); 
      });

});
       
</script>
@endsection