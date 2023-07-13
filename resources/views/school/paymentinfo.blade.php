@extends('school/schoolheader')
@section('paymentinfo','active')
@section('content')

       <div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Payment Info, 
                   Section : {{ Session::get('section') }} </h4></div>
                      <div class="col-3">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            
                      </div>
                 </div>
                 <div class="col-3">
                    <div class="d-grid gap-2 d-md-flex "> 
                   
               
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


       </div> 

       
 <div class="card-block table-border-style">                     
 <div class="table-responsive">
  <table class="table table-bordered" id="employee_data">
    <thead>
          <tr>
             <th>Class</th>
             <th>Group</th>
             <th>Section</th>
             <th>Date</th>
             <th>Description 1 </th>
             <th>Description Amount 1 </th>
             <th>Total amount 1</th>
             <th>Action</th>
          </tr>
    </thead>
    <tbody>

	@foreach($data as $row)
	 <tr>
         <td> {{$row->class}} </td>
         <td> {{$row->babu}} </td>
         <td> {{$row->section}} </td>
         <td> {{$row->date}} </td>
         <td> {{$row->des1}} </td>
         <td> {{$row->des_amount1}} </td>
         <td> {{$row->amount1}} </td>
     <td>

    
        <button type="button" name="view" id="{{$row->id}}" class="btn btn-success btn-sm view" >Edit</button>
     
     </td>

     
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


<script>
  $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:"yy-mm-dd",
	     yearRange: "2020:2040",
    });
	
  });
  </script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>







<!-- Modal  Edit -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Payment View Edit class: <b id="class"></b> , Group : <b id="babu"> </b> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
 <form method="post" action="{{url('paymentinfoupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

           <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>

           <div class="col-lg-4 my-2">
               <label for="fname">Date(yyyy-mm-dd)</label>
               <input type="date" id="edit_date" name="date" autocomplete="off"  class="form-control datepicker" >
            </div>

          	
            <div class="col-lg-8 my-2">
               <label for="roll">Description 1 array(,) </label>
               <input type="text" name="des1" id="edit_des1" class="form-control" placeholder=""  required>
            </div>

            <div class="col-lg-8 my-2">
                <label for="name">Description Amount 1 array(,)</label>
                 <input type="text" name="des_amount1" id="edit_des_amount1" class="form-control" placeholder=""  required>
            </div>

            <div class="col-lg-4 my-2">
               <label for="name">Total Amount 1</label>
               <input type="number" name="amount1" id="edit_amount1" class="form-control" placeholder=""  required>
            </div>



           



       
         
      </div>     
      <input type="submit"   id="insert" value="Update" class="btn btn-success mx-3 mt-3" />
              
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

      $(document).on('click','.view',function(){
             var edit_id = $(this).attr("id");  
              $('#editmodal').modal('show');
              $.ajax({
              type:'GET',
              url:'/paymentview/'+edit_id,
             success:function(response){        
                  // console.log(response)
                  $('#edit_id').val(response.data.id);
                  $("#edit_des1").val(response.data.des1);
                  $("#edit_date").val(response.data.date);
                  $("#edit_des_amount1").val(response.data.des_amount1);
                  $("#edit_amount1").val(response.data.amount1);
                  $("#class").text(response.data.class);
                  $("#babu").text(response.data.babu);
                }
             }); 
      });

});
       
</script>




@endsection     