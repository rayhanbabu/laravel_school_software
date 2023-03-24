@extends('school/schoolheader')
@section('studentindex','active')
@section($class.$babu,'active')
@section('content')

<div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Class : {{$class}}, Group: {{$babu}}, Section : {{Session::get('section')}} </h4></div>
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

							 <input type ="hidden" name="class" id="class" value="{{$class}}">
							 <input type ="hidden" name="babu" id="babu" value="{{$babu}}">


           

            <div class="col-lg-6 my-2">
                <label for="roll">Roll<span style="color:red;"> * </span></label>
                <input type="number" min="1" name="roll" id="roll" class="form-control" placeholder="" required>
            </div>

            
            <div class="col-lg-6 my-2">
               <label for="name">Name of Student<span style="color:red;"> * </span></label>
               <input type="text" name="name" id="name" class="form-control" placeholder="" required>
            </div>


            <div class="col-lg-6 my-2">
              <label for="name">Phone Number(88)</label>
                <input type="text" name="phone" pattern="[0][1][3 4 7 6 5 8 9][0-9]{8}" title="
				          Please select Valid mobile number" id="phone" class="form-control"  >
            </div>


           

             <div class="col-lg-6 my-2">
               <label for="lname">Moral Education <span style="color:red;"> * </span></label>
                   <select class="form-select" name="moral" id="moral" aria-label="Default select example"  required >
                           <option  value="">Select One </option>
                                       <option  value="Islam">Islam & Moral Education</option>
				                       <option  value="Hindu">Hindu & Moral Education	</option>
						               <option  value="Chirstian">Chirstian & Moral Education</option>
						               <option  value="Buddist">Buddist & Moral Education	</option>
                           </select>
             </div>

         @if($babu=='Science')   

            <div class="col-lg-6 my-2">
              <label for="lname"> Main Subject <span style="color:red;"> * </span></label>
                        <select class="form-select" name="main" id="main" aria-label="Default select example"  required >
                                   <option  value="">Select One </option>
                                              <option  value="Agr">Agriculture</option>
				                              <option  value="Hig">Higher Math</option>
						                      <option  value="Bio">Biology</option>
                                 </select>
            </div>

            <div class="col-lg-6 my-2">
              <label for="lname"> Additional Subject <span style="color:red;"> * </span></label>
              <select class="form-select" name="addi" id="addi" aria-label="Default select example"  required >
                            <option  value="">Select One </option>
                                     <option  value="Agr">Agriculture</option>
				                     <option  value="Hig">Higher Math</option>
						              <option  value="Bio">Biology</option>
             </select>
            </div>

            @elseif($babu=='Humanities')

            <div class="col-lg-6 my-2">
              <label for="lname">Main Subject <span style="color:red;"> * </span></label>
                      <select class="form-select" name="main" id="main" aria-label="Default select example"  required >
                         <option value="">Select One </option>
                                      <option value="Civ">Civics & Citizenship</option>
				                      <option value="Eco">Economics</option>	
                     </select>
            </div>

            <div class="col-lg-6 my-2">
              <label for="lname">Additional Subject <span style="color:red;"> * </span></label>
                      <select class="form-select" name="addi" id="addi" aria-label="Default select example"  required >
                             <option  value="">Select One </option>
                                        <option  value="Agr">Agriculture</option>
				                        <option  value="Civ">Civics & Citizenship</option>
				                        <option  value="Eco">Economics</option>
                     </select>
            </div>

              @elseif($babu=='Commerce')
                             <input type ="hidden" name="main" id="main" value="Ent">
					      	 <input type ="hidden" name="addi" id="addi" value="Agr">

                     @else
                             <input type ="hidden" name="main" id="main" value="NA">
					      	<input type ="hidden" name="addi" id="addi" value="NA">

                   @endif

            <div class="col-lg-6 my-2">
               <label for="fname">Name of Father's</label>
               <input type="text" name="father" id="father" class="form-control" placeholder="" >
            </div>


            <div class="col-lg-6 my-2">
               <label for="fname">Name of Mother's</label>
               <input type="text" name="mother" id="mother" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-12 my-2">
               <label for="fname">Address</label>
               <input type="text" name="address" id="address" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-6 my-2">
             <label for="avatar">Select Image<span style="color:red;"> (Image must be 300*300px) </span></label>
             <input type="file" name="image"  id="image" class="form-control" >
          </div>

          <div class="col-lg-6 my-2">
               <label for="fname">Birth of student(yyyy-mm-dd)</label>
               <input type="text"  id="birth_date" name="birth_date" autocomplete="off"  class="form-control datepicker" readonly>
            </div>

         
  

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

							 <input type ="hidden" name="class" id="class" value="{{$class}}">
							 <input type ="hidden" name="babu" id="babu" value="{{$babu}}">

        
            <div class="col-lg-6 my-2">
              <label for="roll">Roll<span style="color:red;"> * </span></label>
              <input type="number" min="1" name="roll" id="edit_roll" class="form-control" placeholder="" required>
            </div>

            <div class="col-lg-6 my-2">
              <label for="name">Name of Student<span style="color:red;"> * </span></label>
              <input type="text" name="name" id="edit_name" class="form-control" placeholder="" required>
            </div>

            <div class="col-lg-6 my-2">
              <label for="name">Phone Number(88)</label>
              <input type="text" name="phone" pattern="[0][1][3 4 7 6 5 8 9][0-9]{8}" title="
				          Please select Valid mobile number"  id="edit_phone" class="form-control" placeholder="" >
            </div>


            <div class="col-lg-6 my-2">
              <label for="lname">Moral Education <span style="color:red;"> * </span></label>
                    <select class="form-select" name="moral" id="edit_moral" aria-label="Default select example"  required >
                                      <option  value="">Select One </option>
                                       <option  value="Islam">Islam & Moral Education</option>
				                       <option  value="Hindu">Hindu & Moral Education	</option>
						               <option  value="Chirstian">Chirstian & Moral Education</option>
						               <option  value="Buddist">Buddist & Moral Education	</option>
                   </select>
            </div>


   @if($babu=='Science')   
        <div class="col-lg-6 my-2">
             <label for="lname">Main Subject <span style="color:red;"> * </span></label>
            <select class="form-select" name="main" id="edit_main" aria-label="Default select example"  required >
                     <option  value="">Select One </option>
                                  <option  value="Agr">Agriculture</option>
				                  <option  value="Hig">Higher Math</option>
						          <option  value="Bio">Biology</option>
          </select>
        </div>

       <div class="col-lg-6 my-2">
        <label for="lname">Additional Subject <span style="color:red;"> * </span></label>
        <select class="form-select" name="addi" id="edit_addi" aria-label="Default select example"  required >
                                   <option  value="">Select One </option>
                                     <option  value="Agr">Agriculture</option>
				                     <option  value="Hig">Higher Math</option>
						             <option  value="Bio">Biology</option>
       </select>
     </div>

     @elseif($babu=='Humanities')

    <div class="col-lg-6 my-2">
      <label for="lname">Main Subject <span style="color:red;">*</span></label>
         <select class="form-select" name="main" id="edit_main" aria-label="Default select example"  required >
                   <option value="">Select One </option>
                              <option  value="Civ">Civics & Citizenship</option>
				             <option  value="Eco">Economics</option>
                                     
        </select>
   </div>

       <div class="col-lg-6 my-2">
         <label for="lname">Additional Subject  <span style="color:red;">*</span></label>
              <select class="form-select" name="addi" id="edit_addi" aria-label="Default select example"  required >
                              <option  value="">Select One </option>
                                      <option  value="Agr">Agriculture</option>
				                       <option  value="Civ">Civics & Citizenship</option>
				                       <option  value="Eco">Economics</option>
              </select>
      </div>

      @elseif($babu=='Commerce')
               <input type ="hidden" name="main" id="edit_main" value="{{$class}}">
               <input type ="hidden" name="addi" id="edit_addi" value="{{$babu}}">

     @else
           <input type ="hidden" name="main" id="edit_main" value="{{$class}}">
           <input type ="hidden" name="addi" id="edit_addi" value="{{$babu}}">

     @endif



            <div class="col-lg-6 my-2">
               <label for="fname">Name of Father's</label>
               <input type="text" name="father" id="edit_father" class="form-control" placeholder="" >
            </div>


            <div class="col-lg-6 my-2">
               <label for="fname">Name of Mother's</label>
               <input type="text" name="mother" id="edit_mother" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-12 my-2">
               <label for="fname">Address</label>
               <input type="text" name="address" id="edit_address" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-6 my-2">
             <label for="avatar">Select Image<span style="color:red;"> (Image must be 300*300px) </span></label>
             <input type="file" name="image"  id="imageedit" class="form-control" >
          </div>

           <div class="col-lg-6 my-2">
               <label for="fname">Birth of student(yyyy-mm-dd)</label>
               <input type="text"  id="edit_birth_date" name="birth_date" autocomplete="off"  class="form-control datepicker" readonly>
            </div>
              
           


         </div>

            <div class="mt-2" id="avatar">

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
	     yearRange: "2000:2025",
    });
  });
  </script>
  
 






<!-- Modal Edit -->
<div class="modal fade" id="viewEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Student Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
     
         <div class="mt-2" id="imageview">

            </div>
            <div class="row">
                    <div class="col-lg-4 ">Student Name </div>
                    <div class="col-lg-8 "> <label><b id='view_name'></b></label></div> 
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Roll</div>
                    <div class="col-lg-8 "> <label><b id='view_roll'></b></label></div>
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Class</div>
                    <div class="col-lg-8 "> <label><b id='view_class'></b></label></div> 
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Section</div>
                    <div class="col-lg-8 "> <label><b id='view_section'></b></label></div> 
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Group</div>
                    <div class="col-lg-8 "> <label><b id='view_babu'></b></label></div>
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Moral Education</div>
                    <div class="col-lg-8 "> <label><b id='view_moral'></b></label></div>
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Father's Name</div>
                    <div class="col-lg-8 "> <label><b id='view_father'></b></label></div> 
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 "> Mother's Name</div>
                    <div class="col-lg-8 "> <label><b id='view_mother'></b></label></div> 
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 ">Birth of Date</div>
                    <div class="col-lg-8 "> <label><b id='view_birth_date'></b></label></div> 
                    <hr class="dropdown-divider" />
                    <div class="col-lg-4 ">Address</div>
                    <div class="col-lg-8 "> <label><b id='view_address'></b></label></div>      
            </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script>  
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
 
       // add new employee ajax request
      
         let formData=new FormData($('#add_form')[0]);
  
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        var extension = $('#image').val().split('.').pop().toLowerCase();
        const fd = new FormData(this);

        if(jQuery.inArray(extension, ['','png','jpeg','jpg']) == -1)
        {Swal.fire("Please select Image ", "", "warning"); }else{
    
        $.ajax({
          type:'POST',
          url:'/student/store',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               $("#add_employee_btn").prop('disabled', true)
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
            $("#add_employee_btn").prop('disabled', false)  
            $('.loader').hide();
          }
        });

       }
      });


      fetchAll();
      function fetchAll() {
        $.ajax({
          type:'GET',
          url:'/student/fetchall/{{$class}}/{{$babu}}',
          success: function(response) {
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
          url:'/student/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#edit_roll").val(response.data.roll);
            $("#edit_name").val(response.data.name);
            $("#edit_phone").val(response.data.phone);
            $("#edit_main").val(response.data.main);
            $("#edit_addi").val(response.data.addi);
            $("#edit_moral").val(response.data.moral);
            $("#edit_father").val(response.data.father);
            $("#edit_mother").val(response.data.mother);
            $("#edit_address").val(response.data.address);
            $("#edit_birth_date").val(response.data.birth_date);
            $("#edit_syear").val(response.data.syear);
            $("#edit_sexam").val(response.data.sexam);
            $("#edit_sgp").val(response.data.sgp);
            $("#edit_sg").val(response.data.sg);
            $("#edit_sroll").val(response.data.sroll);
            $("#edit_sreg").val(response.data.sreg);
            $("#edit_sboard").val(response.data.sboard);
            $("#avatar").html(
              `<img src="/uploads/student/${response.data.image}" width="100" class="img-fluid img-thumbnail">`);
            $("#edit_id").val(response.data.id);
          }
        });
      });


       // View employee ajax request
     
       $(document).on('click', '.view', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $("#viewEmployeeModal").modal('show');
        $.ajax({
          type:'GET',
          url:'/student/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#view_roll").text(response.data.roll);
            $("#view_class").text(response.data.class);
            $("#view_section").text(response.data.section);
            $("#view_babu").text(response.data.babu);
            $("#view_name").text(response.data.name);
            $("#view_phone").text(response.data.phone);
            $("#view_moral").text(response.data.moral);
            $("#view_father").text(response.data.father);
            $("#view_mother").text(response.data.mother);
            $("#view_address").text(response.data.address);
            $("#view_birth_date").text(response.data.birth_date);
            $("#imageview").html(
              `<img src="/uploads/student/${response.data.image}" width="100" class="img-fluid-center img-thumbnail">`);
          
          }
        });
        
       
      });


       // update employee ajax request
       $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        var extension = $('#imageedit').val().split('.').pop().toLowerCase();
        const fd = new FormData(this);

       if(jQuery.inArray(extension, ['','png','jpeg','jpg']) == -1)
       {Swal.fire("Please select Image ", "", "warning"); }else{
        $.ajax({
          type:'POST',
          url:'/student/update',
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
            if (response.status == 100){
               Swal.fire("Updated",response.message, "success");
               $("#edit_employee_btn").text('Update');
               $("#edit_employee_form")[0].reset();
               $("#editEmployeeModal").modal('hide');
               fetchAll();
             }else if(response.status == 200){
                 Swal.fire("Warning",response.message, "warning");
             }else if(response.status == 300){
                 Swal.fire("Warning",response.message, "warning");
             }else if(response.status == 404){
                 Swal.fire("Warning",response.message, "warning");
             }
            $("#edit_employee_btn").prop('disabled', false)
            $('.loader').hide();
          }
         
        });
      }
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
          if (result.isConfirmed) {
            $.ajax({
              url:'/student/delete',
              method: 'delete',
              data: {
                id: id,
              },
              success: function(response) {
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