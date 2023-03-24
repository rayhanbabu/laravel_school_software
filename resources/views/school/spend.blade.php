@extends('school/schoolheader')
@section('spend','active')
@section('content')

<div class="row mt-3 mb-0 mx-2">
               <div class="col-4"> <h4 class="mt-0">Spend Infomation </h4> </div>
                          <div class="col-3">
                             <form action="{{url('/spendday')}}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="date" name="date" class="form-control" value="" required>
                                <button type="submit" name="search" class="btn btn-primary">Daily Spend  </button>
					                   </form> 
                         </div>


                         <div class="col-3">
                             <form action="{{url('spendmonth')}}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="month" name="month" class="form-control" value="" required>
                                <button type="submit" name="search" class="btn btn-primary">Monthly Spend  </button>
					                   </form> 
                         </div>


                
                       <div class="col-2">
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
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="add_employee_form" enctype="multipart/form-data">

        <div class="modal-body p-4 bg-light">
          <div class="row">


            <div class="col-lg-12 my-2">
                <label for="name"> Date <span style="color:red;"> * </span></label>
                <input type="date" name="date" id="date" class="form-control"  placeholder=""   required>
            </div>

            <div class="col-lg-12 my-2">
                <label for="name"> Description <span style="color:red;"> * </span></label>
                <input type="text" name="description" id="description" class="form-control"  placeholder=""   required>
            </div>

           <label for="name"> Quantity(Kg/Unit) <span style="color:red;"> * </span></label>
            <div class="col-lg-6 my-2">
                <input type="number" name="qty" id="qty" class="form-control"  placeholder=""   required>
            </div>
             <div class="col-lg-6 my-2">
                     <select class="form-control"   name ="unit" id="unit"  >
                            <option   value="Unit">Unit</option>			
                            <option   value="Kg">Kg</option>
				                    <option   value="Litter">Litter</option>  		   
				            </select>
             </div>

           <div class="col-lg-12 my-2">
                <label for="name"> Amount <span style="color:red;"> * </span></label>
                <input type="number" name="price" id="price" class="form-control"  placeholder=""   required>
            </div>



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







{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST" id="edit_employee_form" enctype="multipart/form-data">
        <input type="hidden" name="edit_id" id="edit_id">
         <div class="modal-body p-4 bg-light">
          <div class="row">
	
         
          <div class="col-lg-12 my-2">
                <label for="name"> Date <span style="color:red;"> * </span></label>
                <input type="text" name="date" id="edit_date" class="form-control datepicker"  placeholder="" readonly>
            </div>

            <div class="col-lg-12 my-2">
                <label for="name"> Description <span style="color:red;"> * </span></label>
                <input type="text" name="description" id="edit_description" class="form-control"  placeholder="" required>
            </div>

           <label for="name"> Quantity(Kg/Unit) <span style="color:red;"> * </span></label>
            <div class="col-lg-6 my-2">
                <input type="number" name="qty" id="edit_qty" class="form-control"  placeholder=""   required>
            </div>
             <div class="col-lg-6 my-2">
                     <select class="form-control"   name ="unit" id="edit_unit"  >
                            <option   value="Unit">Unit</option>			
                            <option   value="Kg">Kg</option>
				                    <option   value="Litter">Litter</option>  		   
				            </select>
             </div>

           <div class="col-lg-12 my-2">
                <label for="name"> Amount <span style="color:red;"> * </span></label>
                <input type="number" name="price" id="edit_price" class="form-control"  placeholder=""   required>
            </div>
          



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
          url:'/spend/store',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               $("#edit_employee_btn").prop('disabled', true)
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
            $("#edit_employee_btn").prop('disabled', false)
          }
        });

      });


      fetchAll();
      function fetchAll() {
        $.ajax({
          type:'GET',
          url:'/spend/fetchall',
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
          url:'/spend/edit',
          data: {
              id: id,
           },
          success: function(response){
              $("#edit_date").val(response.data.date);
              $("#edit_description").val(response.data.description);
              $("#edit_qty").val(response.data.qty);
              $("#edit_unit").val(response.data.unit);
              $("#edit_price").val(response.data.price);
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
          url:'/spend/update',
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
              url:'/spend/delete',
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