@extends('school/schoolheader')
@section('paymentinfo','active')
@section('content')

      <?php
          $x= date('j'); // current day
       ?>

       <div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Payment Info, 
                   Section : {{ Session::get('section') }} </h4></div>
                      <div class="col-3">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            
                      </div>
                 </div>
                 <div class="col-3">
                    <div class="d-grid gap-2 d-md-flex "> 
                   
                  @if($school->inv_access_day==$x)
                         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                              Change Month
                         </button>
                   @endif
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
             <th>Previous  month</th>
             <th>Current month</th>
             <th>Description 1</th>
             <th>amount 1</th>
             <th>Description 2</th>
             <th>amount 2</th>
             <th>Action</th>
          </tr>
    </thead>
    <tbody>

	@foreach($data as $row)
	 <tr>
         <td> {{$row->class}} </td>
         <td> {{$row->babu}} </td>
         <td> {{$row->section}} </td>
         <td> <?php echo  date('F-Y',strtotime($row->pre_date)) ?> </td>
         <td> <?php echo  date('F-Y',strtotime($row->date)) ?> </td>
         <td> {{$row->des1}} </td>
         <td> {{$row->amount1}} </td>
         <td> {{$row->des2}} </td>
         <td> {{$row->amount2}} </td>
     <td>

     @if($school->inv_access_day==$x)
        <button type="button" name="view" id="{{$row->id}}" class="btn btn-success btn-sm view" >View/Edit</button>
     @endif
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




<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Month</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
   <div class="modal-body">
       <form method="post" action="{{url('invoicedate')}}"  class="myform"  enctype="multipart/form-data" >
             {!! csrf_field() !!}


              <div class="my-2">
                  <label for="name">Current Month Payment <span style="color:red;"> * </span></label>
                   <input type="text"  id="date" name="date" autocomplete="off"  class="form-control datepicker"   readonly>
               </div>
           

               <div class="my-2">
                  <label for="name">Previous Month Payment <span style="color:red;"> * </span></label>
                   <input type="text"  id="pre_date" name="pre_date" autocomplete="off"  class="form-control datepicker"   readonly>
               </div>

           <div class="mt-4">
             <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit </button>
          </div>  
             
      </form>
   </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
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

          
           <div class="col-lg-2 my-2">
              <label for="roll">Serial</label>
               <p>1</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <label for="roll">Description </label>
               <input type="text" name="des1" id="edit_des1" class="form-control" placeholder=""  required>
            </div>

            <div class="col-lg-4 my-2">
               <label for="name">Amount</label>
               <input type="number" name="amount1" id="edit_amount1" class="form-control" placeholder=""  required>
            </div>



            <div class="col-lg-2 my-2">
               <p>2</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des2" id="edit_des2" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount2" id="edit_amount2" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>3</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des3" id="edit_des3" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount3" id="edit_amount3" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>4</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des4" id="edit_des4" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount4" id="edit_amount4" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>5</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des5" id="edit_des5" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount5" id="edit_amount5" class="form-control" placeholder=""  >
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