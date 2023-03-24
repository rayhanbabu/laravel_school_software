@extends('maintain/dashboardheader')
@section('content')

<div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Vedio Infomation </h4></div>
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

             <div class="col-lg-6 my-2">
                <label for="lname">Category <span style="color:red;"> * </span></label>
                   <select class="form-select" name="category" id="category" aria-label="Default select example"  required >
                          <option value="">Select</option>
                          <option value="Vedio">Vedio</option>
                          <option value="Image">Image</option> 
                          <option value="Dining">Dining</option>   
                   </select>
             </div>


             <div class="col-lg-6 my-2">
                 <label for="name"> Serial<span style="color:red;"> * </span></label>
                 <input type="number" name="serial" id="serial" class="form-control"  placeholder=""   required>
            </div> 

            <div class="col-lg-6 my-2">
                 <label for="name"> Vedio Text 1 <span style="color:red;"> * </span></label>
                 <input type="text" name="text1" id="text1" class="form-control"  placeholder=""   required>
            </div>

            <div class="col-lg-6 my-2">
                  <label for="name"> Vedio Frame link <span style="color:red;"> * </span></label>
                 <input type="text" name="vedio" id="vedio" class="form-control"  placeholder=""   required>
            </div>  
            
             <div class="col-lg-6 my-2">
                 <label for="name">  Text 2 <span style="color:red;"> * </span></label>
                 <input type="text" name="text2" id="text2" class="form-control"  placeholder=""   required>
            </div>
            
             <div class="col-lg-6 my-2">
                 <label for="name">  Text 3 <span style="color:red;"> * </span></label>
                 <input type="text" name="text3" id="text3" class="form-control"  placeholder=""   required>
              </div>
              
               <div class="col-lg-6 my-2">
                 <label for="name">  Text 4 <span style="color:red;"> * </span></label>
                 <input type="text" name="text4" id="text4" class="form-control"  placeholder=""   required>
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
	
         
          <div class="col-lg-6 my-2">
                <label for="lname">Category <span style="color:red;"> * </span></label>
                   <select class="form-select" name="category" id="edit_category" aria-label="Default select example"  required >
                          <option value="">Select</option>
                          <option value="Vedio">Vedio</option>
                          <option value="Image">Image</option>   
                           <option value="Dining">Dining</option>   
                   </select>
             </div>

            <div class="col-lg-6 my-2">
                 <label for="name"> Serial<span style="color:red;"> * </span></label>
                 <input type="text" name="serial" id="edit_serial" class="form-control"  placeholder=""   required>
            </div>

            <div class="col-lg-6 my-2">
                 <label for="name"> Vedio Text 1 <span style="color:red;"> * </span></label>
                 <input type="text" name="text1" id="edit_text1" class="form-control"  placeholder=""   required>
            </div>

            <div class="col-lg-6 my-2">
                  <label for="name"> Vedio Frame link <span style="color:red;"> * </span></label>
                 <input type="text" name="vedio" id="edit_vedio" class="form-control"  placeholder=""   required>
            </div>

          
           
            <div class="col-lg-6 my-2">
                 <label for="name">  Text 2 <span style="color:red;"> * </span></label>
                 <input type="text" name="text2" id="edit_text2" class="form-control"  placeholder=""   required>
            </div>
            
             <div class="col-lg-6 my-2">
                 <label for="name">  Text 3 <span style="color:red;"> * </span></label>
                 <input type="text" name="text3" id="edit_text3" class="form-control"  placeholder=""   required>
              </div>
              
               <div class="col-lg-6 my-2">
                 <label for="name">  Text 4 <span style="color:red;"> * </span></label>
                 <input type="text" name="text4" id="edit_text4" class="form-control"  placeholder=""   required>
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
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
 
          // add new employee ajax request
      
      let formData=new FormData($('#add_form')[0]);
  
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();
      
        const fd = new FormData(this);

        $.ajax({
          type:'POST',
          url:'/vedioinfo/store',
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
          url:'/vedioinfo/fetchall',
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
          url:'/vedioinfo/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#edit_category").val(response.data.category);
            $("#edit_text1").val(response.data.text1);
            $("#edit_vedio").val(response.data.vedio);
            $("#edit_serial").val(response.data.serial);
            $("#edit_text2").val(response.data.text2);
            $("#edit_text3").val(response.data.text3);
            $("#edit_text4").val(response.data.text4);
           

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
          url:'/vedioinfo/update',
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
              url:'/vedioinfo/delete',
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



     
   
	




});

</script>




@endsection     