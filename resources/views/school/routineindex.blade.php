@extends('school/schoolheader')
@section('routineindex','active')
@section('content')


<div class="row mt-3 mb-0 mx-2">
               <div class="col-4"> <h4 class="mt-0">Class Routine, Section : {{Session::get('section')}} </h4></div>


                     <div class="col-4">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                           
      <form method="post" action="{{url('routine')}}"  class="myform"  enctype="multipart/form-data" >
                {!! csrf_field() !!}
                           
                            <select class="js-example-basic-single form-control"   name ="class"  required>
				                        <option  value="">Select Class </option>
                                   @foreach($class as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                    @endforeach		   						
				                    </select>

                          


                            <select class="form-control"   name ="babu" required >
				                         <option  value="">Select Group </option>
                                 @foreach($babu as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	 
				                    </select>
                            	
                         <button  type="submit" id="add_employee_btn" class="btn btn-primary my-1">Pdf View </button>
                 </form>

                         </div>
                     </div>
                    

                   

                     <div class="col-2">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            
                         </div>
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
                             <option  value="">Select One </option>
                             @foreach($class as $row)
                             <option   value="{{$row->text1}}">{{$row->text2}}</option>
                             @endforeach  
               </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="lname">Group <span style="color:red;"> * </span></label>
                  <select class="form-select" name="babu" id="babu" aria-label="Default select example" required  >
                         <option   value="">Select One </option>
                           @foreach($babu as $row)
                             <option   value="{{$row->text1}}">{{$row->text2}}</option>
                             @endforeach         
                  </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name">Day<span style="color:red;"> * </span></label>
                    <select class="form-control"   name ="day" id="day" required >
				                    <option  value="">Select Day </option>
                            <option   value="Saturday">Saturday</option>
				                    <option   value="Sunday">Sunday</option>
						                <option   value="Monday">Monday</option>
				                    <option   value="Tuesday">Tuesday</option> 
                            <option   value="Wednesday">Wednesday</option>
                            <option   value="Thursday">Thursday</option>                      							 
				              </select>     
            </div>


            <div class="col-lg-2 my-2">
              <label for="roll">Serial</label>
               <p>1</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <label for="roll">Time(Form-To)</label>
              <input type="text"  id="date1" name="date1"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <label for="name">Name od Subject</label>
              <select class="js-example-basic-single1 form-select" name="sub1" id="sub1" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name">Name of Teacher</label>
              <select class="form-select" name="tea1" id="tea1" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>2</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date2" name="date2"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub2" id="sub2" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea2" id="tea2" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>3</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date3" name="date3"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub3" id="sub3" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea3" id="tea3" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>




            <div class="col-lg-2 my-2">
               <p>4</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date4" name="date4"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub4" id="sub4" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea4" id="tea4" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>5</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date5" name="date5"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub5" id="sub5" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea5" id="tea5" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>6</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date6" name="date6"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub6" id="sub6" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea6" id="tea6" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>7</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date7" name="date7"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub7" id="sub7" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea7" id="tea7" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>




            <div class="col-lg-2 my-2">
               <p>8</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="date8" name="date8"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub8" id="sub8" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea8" id="tea8" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
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
                             <option   value="{{$row->text1}}">{{$row->text2}}</option>
                             @endforeach  
               </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="lname">Group <span style="color:red;"> * </span></label>
                  <select class="form-select" name="babu" id="edit_babu" aria-label="Default select example" required  >
                         <option   value="">Select One </option>
                           @foreach($babu as $row)
                             <option   value="{{$row->text1}}">{{$row->text2}}</option>
                             @endforeach         
                  </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name">Day<span style="color:red;"> * </span></label>
                    <select class="form-control"   name ="day" id="edit_day" required >
				                    <option  value="">Select Day </option>
                            <option   value="Saturday">Saturday</option>
				                    <option   value="Sunday">Sunday</option>
						                <option   value="Monday">Monday</option>
				                    <option   value="Tuesday">Tuesday</option> 
                            <option   value="Wednesday">Wednesday</option>
                            <option   value="Thursday">Thursday</option>                      							 
				              </select>     
            </div>


            <div class="col-lg-2 my-2">
              <label for="roll">Serial</label>
               <p>1</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <label for="roll">Time(Form-To)</label>
              <input type="text"  id="edit_date1" name="date1"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <label for="name">Name od Subject</label>
              <select class="form-select" name="sub1" id="edit_sub1" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <label for="name">Name of Teacher</label>
              <select class="form-select" name="tea1" id="edit_tea1" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>2</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date2" name="date2"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub2" id="edit_sub2" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea2" id="edit_tea2" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>3</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date3" name="date3"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub3" id="edit_sub3" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea3" id="edit_tea3" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>




            <div class="col-lg-2 my-2">
               <p>4</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date4" name="date4"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub4" id="edit_sub4" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea4" id="edit_tea4" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>5</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date5" name="date5"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub5" id="edit_sub5" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea5" id="edit_tea5" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>6</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date6" name="date6"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub6" id="edit_sub6" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea6" id="edit_tea6" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>



            <div class="col-lg-2 my-2">
               <p>7</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date7" name="date7"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub7" id="edit_sub7" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea7" id="edit_tea7" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
            </div>




            <div class="col-lg-2 my-2">
               <p>8</p>
            </div>
							
            <div class="col-lg-3 my-2">
              <input type="text"  id="edit_date8" name="date8"   class="form-control ">
            </div>

            <div class="col-lg-3 my-2">
              <select class="form-select" name="sub8" id="edit_sub8" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($subject as $row)
                             <option   value="{{$row->serial}}">{{$row->text1}}</option>
                             @endforeach
             </select>
            </div>

            <div class="col-lg-4 my-2">
              <select class="form-select" name="tea8" id="edit_tea8" aria-label="Default select example"   >
                             <option  value="">Select One </option>
                             @foreach($teacher as $row)
                             <option   value="{{$row->id}}">{{$row->name}}</option>
                             @endforeach
             </select>
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
	     yearRange: "2020:2050",
    });
  });
  </script>
  



<script>  
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
 
       // add new employee ajax request
      
       $('.js-example-basic-single').select2();

         let formData=new FormData($('#add_form')[0]);
  
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();
      
        const fd = new FormData(this);

        $.ajax({
          type:'POST',
          url:'/routine/store',
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
          url:'/routine/fetchall',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [0, 'asc'],
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
          url:'/routine/edit',
          data: {
            id: id,
          },
          success: function(response){
            $("#edit_class").val(response.data.class);
            $("#edit_babu").val(response.data.babu);
            $("#edit_day").val(response.data.day);

            $("#edit_date1").val(response.data.date1);
            $("#edit_date2").val(response.data.date2);
            $("#edit_date3").val(response.data.date3);
            $("#edit_date4").val(response.data.date4);
            $("#edit_date5").val(response.data.date5);
            $("#edit_date6").val(response.data.date6);
            $("#edit_date7").val(response.data.date7);
            $("#edit_date8").val(response.data.date8);
          
           
            $("#edit_sub1").val(response.data.sub1);
            $("#edit_sub2").val(response.data.sub2);
            $("#edit_sub3").val(response.data.sub3);
            $("#edit_sub4").val(response.data.sub4);
            $("#edit_sub5").val(response.data.sub5);
            $("#edit_sub6").val(response.data.sub6);
            $("#edit_sub7").val(response.data.sub7);
            $("#edit_sub8").val(response.data.sub8);

            $("#edit_tea1").val(response.data.tea1);
            $("#edit_tea2").val(response.data.tea2);
            $("#edit_tea3").val(response.data.tea3);
            $("#edit_tea4").val(response.data.tea4);
            $("#edit_tea5").val(response.data.tea5);
            $("#edit_tea6").val(response.data.tea6);
            $("#edit_tea7").val(response.data.tea7);
            $("#edit_tea8").val(response.data.tea8);
          

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
          url:'/routine/update',
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
              url:'/routine/delete',
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