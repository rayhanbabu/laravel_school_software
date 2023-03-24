@extends('school/schoolheader')
@section('exstudent','active')
@section('content')

<div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Ex Student</h4></div>
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

						
           

            <div class="col-lg-3 my-2">
              <label for="roll">Roll<span style="color:red;"> * </span></label>
              <input type="number" min="1" name="roll" id="roll" class="form-control" placeholder="" required>
            </div>

              <div class="col-lg-3 my-2">
                         <label class=""><b>Class<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="class" id="class"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($class as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
                        </select>
             </div>


            <div class="col-lg-3 my-2">
                        <label class=""><b>Group<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="babu" id="babu"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($group as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	 
                        </select>
            </div>

            <div class="col-lg-3 my-2">
                 <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                           <select class="form-select" name="section" id="section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                         </select>
            </div>


           


            <div class="col-lg-6 my-2">
              <label for="name">Name od Student<span style="color:red;"> * </span></label>
              <input type="text" name="name" id="name" class="form-control" placeholder="" required>
            </div>

            <div class="col-lg-6 my-2">
              <label for="name">Phone Number(880)</label>
              <input type="text" name="phone" pattern="[1][3 4 7 6 5 8 9][0-9]{8}" title="
				          Please select Valid mobile number" id="phone" class="form-control"  >
            </div>


           

         
        
            <div class="col-lg-6 my-2">
               <label for="fname">Name of Father's</label>
               <input type="text" name="father" id="father" class="form-control" placeholder="" >
            </div>


            <div class="col-lg-6 my-2">
               <label for="fname">Name of Mother's</label>
               <input type="text" name="mother" id="mother" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-9 my-2">
               <label for="fname">Address</label>
               <input type="text" name="address" id="address" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-3 my-2">
                      <label class=""><b>Exam Year<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="year" id="year"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($year as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	
                        </select>
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

          <div class="col-lg-3 my-2">
              <label for="roll">Roll<span style="color:red;"> * </span></label>
              <input type="number" min="1" name="roll" id="edit_roll" class="form-control" placeholder="" required>
            </div>

              <div class="col-lg-3 my-2">
                         <label class=""><b>Class<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="class" id="edit_class"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($class as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
                        </select>
             </div>


            <div class="col-lg-3 my-2">
                        <label class=""><b>Group<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="babu" id="edit_babu"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($group as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	 
                        </select>
            </div>

            <div class="col-lg-3 my-2">
                 <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                           <select class="form-select" name="section" id="edit_section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                         </select>
            </div>


            <div class="col-lg-6 my-2">
              <label for="name">Name od Student<span style="color:red;"> * </span></label>
              <input type="text" name="name" id="edit_name" class="form-control" placeholder="" required>
            </div>

            <div class="col-lg-6 my-2">
              <label for="name">Phone Number(880)</label>
              <input type="text" name="phone" pattern="[1][3 4 7 6 5 8 9][0-9]{8}" title="
				          Please select Valid mobile number" id="edit_phone" class="form-control">
            </div>



            <div class="col-lg-6 my-2">
               <label for="fname">Name of Father's</label>
               <input type="text" name="father" id="edit_father" class="form-control" placeholder="" >
            </div>


            <div class="col-lg-6 my-2">
               <label for="fname">Name of Mother's</label>
               <input type="text" name="mother" id="edit_mother" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-9 my-2">
               <label for="fname">Address</label>
               <input type="text" name="address" id="edit_address" class="form-control" placeholder="" >
            </div>

             <div class="col-lg-3 my-2">
                  <label class=""><b>Exam Year<span style="color:red;"> * </span></b></label>
                       <select class="form-select" name="year" id="edit_year"  aria-label="Default select example" required>
                            <option value="">Select</option>
                             @foreach($year as $row)
                                <option value="{{$row->text1}}">{{$row->text2}}</option>
                             @endforeach	
                    </select>
            </div>

            <div class="col-lg-6 my-2">
             <label for="avatar">Select Image<span style="color:red;"> (Image must be 300*300px) </span></label>
             <input type="file" name="image"  id="imageedit" class="form-control" >
          </div>

           <div class="col-lg-6 my-2">
               <label for="fname">Birth of student(yyyy-mm-dd)</label>
               <input type="text"  id="edit_birth_date" name="birth_date" autocomplete="off"  class="form-control datepicker" readonly>
            </div>
              
            <span style="color:red;"> For Testimonial</span>

            <div class="col-lg-3 my-2">
               <label for="fname">Session[xxxx-yyyy]</label>
               <input type="text" name="syear" id="edit_syear" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-5 my-2">
               <label for="fname">Exam Name</label>
               <input type="text" name="sexam" id="edit_sexam" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-2 my-2">
               <label for="fname">Gpa </label>
               <input type="text" name="sgp" id="edit_sgp" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-2 my-2">
               <label for="fname">Grade </label>
               <input type="text" name="sg" id="edit_sg" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-4 my-2">
               <label for="fname">Roll </label>
               <input type="text" name="sroll" id="edit_sroll" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-4 my-2">
               <label for="fname">Registration </label>
               <input type="text" name="sreg" id="edit_sreg" class="form-control" placeholder="" >
            </div>

            <div class="col-lg-4 my-2">
               <label for="fname">Board </label>
               <input type="text" name="sboard" id="edit_sboard" class="form-control" placeholder="" >
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>







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
          url:'/exstudent/store',
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

       }
      });


      fetchAll();
      function fetchAll() {
        $.ajax({
          type:'GET',
          url:'/exstudent/fetchall',
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
          url:'/exstudent/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#edit_roll").val(response.data.roll);
            $("#edit_name").val(response.data.name);
            $("#edit_class").val(response.data.class);
            $("#edit_section").val(response.data.section);
            $("#edit_babu").val(response.data.babu);
            $("#edit_year").val(response.data.year);
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


     


       // update employee ajax request
       $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        var extension = $('#imageedit').val().split('.').pop().toLowerCase();
        const fd = new FormData(this);

       if(jQuery.inArray(extension, ['','png','jpeg','jpg']) == -1)
       {Swal.fire("Please select Image ", "", "warning"); }else{
        $.ajax({
          type:'POST',
          url:'/exstudent/update',
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
              url:'/exstudent/delete',
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