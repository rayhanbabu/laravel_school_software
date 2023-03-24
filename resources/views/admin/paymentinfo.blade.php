@extends('admin/dashboardheader')
@section('content')

<div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Payment Info, Section : 
                 {{$admin->admin_section}}</h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            
                         </div>
                     </div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex "> 
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                class="bi-plus-circle me-2"></i>Add</button>  

              </div>
        </div> 
 </div> 


 <div class="table-responsive">
           <div class="card-body" id="show_all_employees">          
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
            </div>
     </div>


 {{-- add new Student modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="add_employee_form" enctype="multipart/form-data">

        <div class="modal-body p-4 bg-light">
          <div class="row">


             <div class="col-lg-4 my-2">
                <label for="lname">Class <span style="color:red;"> * </span></label>
                <select class="form-select" name="class" id="class" aria-label="Default select example"  required >
                               <option value="">Select</option>
                                    @foreach($class as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
                </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="lname">Group <span style="color:red;"> * </span></label>
                  <select class="form-select" name="babu" id="babu" aria-label="Default select example" required  >
                         <option   value="">Select One </option>
                                @foreach($group as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	      
                  </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name">Payment date<span style="color:red;"> * </span></label>
              <input type="text"  id="date" name="date" autocomplete="off"  class="form-control datepicker" >
            </div>

            <div class="col-lg-2 my-2">
              <label for="roll">Serial</label>
               <p>1</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <label for="roll">Description </label>
               <input type="text" name="des1" id="des1" class="form-control" placeholder=""  required>
            </div>

            <div class="col-lg-4 my-2">
               <label for="name">Amount</label>
               <input type="number" name="amount1" id="amount1" class="form-control" placeholder=""  required>
            </div>



            <div class="col-lg-2 my-2">
               <p>2</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des2" id="des2" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount2" id="amount2" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>3</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des3" id="des3" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount3" id="amount3" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>4</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des4" id="des4" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount4" id="amount4" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>5</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des5" id="des5" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount5" id="amount5" class="form-control" placeholder=""  >
            </div>


            <div class="col-lg-2 my-2">
               <p>6</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des6" id="des6" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount6" id="amount6" class="form-control" placeholder=""  >
            </div>



             
               <!--  <input type="text"  id="datepicker" name="birth_date" autocomplete="off"  class="form-control"><br> -->
            </div>
  
         
          <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>

        <div class="mt-4">
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Submit </button>
       </div>  

      </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
        </div>
      </form>
    </div>
  </div>
</div>

{{-- add new employee modal end --}}


{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="edit_employee_form" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" id="edit_id">
         <div class="modal-body p-4 bg-light">
          <div class="row">



						
          <div class="col-lg-4 my-2">
               <label for="lname">Class <span style="color:red;"> * </span></label>
                <select class="form-select" name="class" id="edit_class" aria-label="Default select example"  required >
                             <option  value="">Select One </option>
                             @foreach($class as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
               </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="lname">Group <span style="color:red;"> * </span></label>
                  <select class="form-select" name="babu" id="edit_babu" aria-label="Default select example" required  >
                                <option   value="">Select One </option>
                                 @foreach($group as $row)
                                         <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	             
                  </select>
            </div>

            <div class="col-lg-4 my-2">
                <label for="name">Payment date<span style="color:red;"> * </span></label>
                 <input type="text"  id="edit_date" name="date" autocomplete="off"  class="form-control datepicker" >
            </div>



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


            <div class="col-lg-2 my-2">
               <p>6</p>
            </div>
							
            <div class="col-lg-6 my-2">
               <input type="text" name="des6" id="edit_des6" class="form-control" placeholder=""  >
            </div>

            <div class="col-lg-4 my-2">
               <input type="number" name="amount6" id="edit_amount6" class="form-control" placeholder=""  >
            </div>




         


          <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>

        <div class="mt-4">
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update </button>
       </div>  

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}


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



<script>  
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
 
       // add new employee ajax request
      
         let formData=new FormData($('#add_form')[0]);
  
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();
      
        const fd = new FormData(this);

        $.ajax({
          type:'POST',
          url:'/paymentinfo/store',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               },
          success: function(response){
            if(response.status == 100){
               Swal.fire("Added",response.message, "success");
               $("#add_employee_btn").text('Submit');
               $("#add_employee_form")[0].reset();
               $("#addEmployeeModal").modal('hide');
               fetchAll();
              }else if(response.status == 200){
               Swal.fire("Warning",response.message,"warning");
              }else if(response.status == 300){
               Swal.fire("Warning",response.message,"warning");
              }else if(response.status == 400){
               Swal.fire("Warning",response.message,"warning");
              }
            $('.loader').hide();
          }
        });

      });


      fetchAll();
      function fetchAll() {
        $.ajax({
          type:'GET',
          url:'/paymentinfo/fetchall',
          success:function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [2, 'asc'],
              lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]]
            });
          }
        });
      }



        // edit employee ajax request
        $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          type:'GET',
          url:'/paymentinfo/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#edit_class").val(response.data.class);
            $("#edit_babu").val(response.data.babu);
            $("#edit_date").val(response.data.date);


            $("#edit_des1").val(response.data.des1);
            $("#edit_des2").val(response.data.des2);
            $("#edit_des3").val(response.data.des3);
            $("#edit_des4").val(response.data.des4);
            $("#edit_des5").val(response.data.des5);
            $("#edit_des6").val(response.data.des6);
           
            
            $("#edit_amount1").val(response.data.amount1);
            $("#edit_amount2").val(response.data.amount2);
            $("#edit_amount3").val(response.data.amount3);
            $("#edit_amount4").val(response.data.amount4);
            $("#edit_amount5").val(response.data.amount5);
            $("#edit_amount6").val(response.data.amount6);
         
          

            $("#edit_id").val(response.data.id);
          }
        });
      });


     


       // update employee ajax request
       $("#edit_employee_form").submit(function(e) {
          e.preventDefault();
      
          const fd = new FormData(this);

         $.ajax({
          type:'POST',
          url:'/paymentinfo/update',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               },
          success:function(response){
            if (response.status == 100){
               Swal.fire("Updated",response.message, "success");
               $("#edit_employee_btn").text('Update');
               $("#edit_employee_form")[0].reset();
               $("#editEmployeeModal").modal('hide');
               fetchAll();
             }else if(response.status == 200){
              Swal.fire("Warning",response.message,"warning");
             }else if(response.status == 300){
              Swal.fire("Warning",response.message,"warning");
             }else if(response.status == 404){
              Swal.fire("Warning",response.message,"warning");
             }
          
            $('.loader').hide();
          }
         
        });
    
      });



        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed){
            $.ajax({
              url:'/paymentinfo/delete',
              method: 'delete',
              data:{
                id: id,
              },
              success: function(response){
                //console.log(response);
                Swal.fire("Deleted", "Data Deleted Successfully!", "success");
                fetchAll();
              }
            });
          }
        })
      });



     
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat:"yy-mm-dd",
	  yearRange: "1995:2015",
    });
	




});

</script>




@endsection     