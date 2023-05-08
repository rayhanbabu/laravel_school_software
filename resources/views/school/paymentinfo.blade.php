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
             <th>Description </th>
             <th>amount </th>
             <th>Action</th>
          </tr>
    </thead>
    <tbody>

	@foreach($data as $row)
	 <tr>
         <td> {{$row->class}} </td>
         <td> {{$row->babu}} </td>
         <td> {{$row->section}} </td>
         <td> {{$row->des1}} </td>
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

          	
            <div class="col-lg-8 my-2">
               <label for="roll">Description </label>
               <textarea  name="des1" id="edit_des1" col="15" rows="5"  class="form-control" required ></textarea>
            </div>

            <div class="col-lg-4 my-2">
               <label for="name">Amount</label>
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
                $('#edit_id').val(response.data.id)
                $("#edit_des1").val(response.data.des1);
                $("#edit_des2").val(response.data.des2);
                $("#edit_des3").val(response.data.des3);
                $("#edit_des4").val(response.data.des4);
                $("#edit_des5").val(response.data.des5);
              
           
            
                $("#edit_amount1").val(response.data.amount1);
                $("#edit_amount2").val(response.data.amount2);
                $("#edit_amount3").val(response.data.amount3);
                $("#edit_amount4").val(response.data.amount4);
                $("#edit_amount5").val(response.data.amount5);

                $("#class").text(response.data.class);
                $("#babu").text(response.data.babu);
              
                
              
            
                }
             }); 
      });

});
       
</script>




@endsection     