 @extends('maintain/dashboardheader')
 @section('content')

 <div class="row mt-4 mb-3">
               <div class="col-3"> <h4 class="mt-0">School View</h4></div>
                     <div class="col-6">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                               <form action="{{url('maintain/adminpdf')}}" method="POST" enctype="multipart/form-data">
                                  {!! csrf_field() !!}
                                   <input type="hidden" name="invoice" class="form-control" value="invoice" required>
                                   <button type="submit" name="search" class="btn btn-primary">Admin pdf </button>
					       </form>  
                             <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#statusmodal">
                          All Status
                        </button>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adminmodal">
                         Admin password Change
                        </button>
                              
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
          <th width="10%" >Image</th>
          <th width="10%" >School Name, Address</th>
	      <th width="10%" >Created, Subscrible, Duration, Expired </th>
	      <th width="15%" >EIIN , Admin pass</th>
          <th width="15%" >school Phone, Password</th>
          <th width="15%" >Payment</th>
          <th width="15%" >Image, Atten, SMS, Fin</th>
          <th width="5%" >View</th>
          <th width="5%" >Status</th>
          <th width="5%" >Admin Status</th>
          <th width="5%" >Edit</th>
          <th width="5%" >Delete</th>
      </tr>
  </thead>
  <tbody>

	@foreach($school as $row)
	 <tr>
   <td><img src="{{ asset('schoolsoft4/public/uploads/admin/'.$row->image) }}" width="100px"  height="90px" alt="Image"></td>
        <td>{{$row->school}}, {{$row->address}}</td>
        <td>{{$row->created_date}}, {{$row->subscribe}}, {{$row->payment_duration}}, {{$row->expired_date}} </td>
        <td>{{$row->eiin}} {{$row->admin_pass}}</td>
        <td>{{$row->school_phone}}<br>{{$row->school_pass}}</td>
        <td>{{$row->payment}}</td>
        <td>{{$row->image_access}}, {{$row->atten_access}}, {{$row->sms_access}}, {{$row->fin_access}} </td>
      
      
    <td>
      <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm view" >View</button>
    </td>

   <td>
        @if($row->status == 1)         
         <a href="{{ url('maintain/schoollist/status/deactive/'.$row->id) }}" class="btn btn-success btn-sm" >Active<a>     
         @else
         <a href="{{ url('maintain/schoollist/status/active/'.$row->id) }}" class="btn btn-danger btn-sm" >Deactive<a>       
        @endif
   </td>

   <td>
      @if($row->admin_status == 1)         
        <a href="{{ url('maintain/schoollist/admin_status/deactive/'.$row->id) }}" class="btn btn-success btn-sm" >Active<a>     
        @else
        <a href="{{ url('maintain/schoollist/admin_status/active/'.$row->id) }}" class="btn btn-danger btn-sm" >Deactive<a>       
        @endif
   </td>

    <td>
      <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm edit" >Edit</button>
    </td>

   <td><a  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to milloff  this month?')"  href="{{ url('maintain/schooldelete/'.$row->id)}}">Delete</a></td>

	</tr>
    @endforeach	 
	</tbody>
  </table>
</div>
</div>


   <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "desc" ]] ,
		"lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
      }
	  );  
 });  
 </script>  
	</div>
</div>


<script type="text/javascript">
           $(document).ready(function(){
             $(document).on('click','.view',function(){
               var edit_id = $(this).attr("id");  
                $('#viewmodal').modal('show');
             $.ajax({
             type:'GET',
             url:'/maintain/schoolview/'+edit_id,
             success:function(response){
               console.log(response.school)             
                $('#school').text(response.school.school)
                $('#address').text(response.school.address)
                $('#eiin').text(response.school.eiin)
                $('#school_phone').text(response.school.school_phone)
                $('#email').text(response.school.email)
                $('#shift').text(response.school.shift)
                $('#school_pass').text(response.school.school_pass)
                $('#admin_pass').text(response.school.admin_pass)
                $('#status').text(response.school.status)
                $('#admin_status').text(response.school.admin_status)
                $('#eiin').text(response.school.eiin)
                $('#year').text(response.school.year)
                $('#exam').text(response.school.exam)
                $('#payment').text(response.school.payment)
                $('#payment_details').text(response.school.payment_details)
                $('#aid').text(response.school.aid)
                $('#aname').text(response.school.aname)
                $('#aphone').text(response.school.aphone)
                $('#aemail').text(response.school.aemail)
                $('#text1').text(response.school.text1)
                $('#text2').text(response.school.text2)
                $('#text3').text(response.school.text3)
                $('#text4').text(response.school.text4)
                $('#mnsize').text(response.school.mnsize)
                $('#ansize').text(response.school.ansize)
                $('#sasize').text(response.school.sasize)
                $('#shsize').text(response.school.shsize)
                $('#teacher_phone').text(response.school.teacher_phone)
                $('#section_des').text(response.school.section_des)
                $('#address_details').text(response.school.address_details)
                $('#test1').text(response.school.test1)
                $('#test2').text(response.school.test2)
                $('#test3').text(response.school.test3)
                $('#test4').text(response.school.test4)
                $('#bank_account').text(response.school.bank_account)
                $('#bank_name').text(response.school.bank_name)
                $('#inv_part').text(response.school.inv_part)

                }
             
             }); 
          });


          $(document).on('click','.edit',function(){
               var edit_id = $(this).attr("id");  
                $('#editmodal').modal('show');
             $.ajax({
             type:'GET',
             url:'/maintain/schoolview/'+edit_id,
             success:function(response){
               console.log(response.school)
             
               $('#edit_id').val(response.school.id)
               $('#edit_school').val(response.school.school)
               $('#edit_address').val(response.school.address)
               $('#edit_eiin').val(response.school.eiin)
               $('#edit_school_phone').val(response.school.school_phone)
               $('#edit_email').val(response.school.email)
               $('#edit_shift').val(response.school.shift)
               $('#edit_school_pass').val(response.school.school_pass)
               $('#edit_admin_pass').val(response.school.admin_pass)
               $('#edit_status').val(response.school.status)
               $('#edit_admin_status').val(response.school.admin_status)
               $('#edit_eiin').val(response.school.eiin)
               $('#edit_year').val(response.school.year)
               $('#edit_exam').val(response.school.exam)
               $('#edit_payment').val(response.school.payment)
               $('#edit_payment_details').val(response.school.payment_details)
               $('#edit_aid').val(response.school.aid)
               $('#edit_aname').val(response.school.aname)
               $('#edit_aphone').val(response.school.aphone)
               $('#edit_aemail').val(response.school.aemail)
               $('#edit_text1').val(response.school.text1)
               $('#edit_text2').val(response.school.text2)
               $('#edit_text3').val(response.school.text3)
               $('#edit_text4').val(response.school.text4)
               $('#edit_teacher_phone').val(response.school.teacher_phone)
               $('#edit_section_des').val(response.school.section_des)
               $('#edit_address_details').val(response.school.address_details)
               $('#edit_image_access').val(response.school.image_access)
               $('#edit_sms_access').val(response.school.sms_access)
               $('#edit_atten_access').val(response.school.atten_access)
               $('#edit_fin_access').val(response.school.fin_access)
               $('#edit_mnsize').val(response.school.mnsize)
               $('#edit_ansize').val(response.school.ansize)
               $('#edit_sasize').val(response.school.sasize)
               $('#edit_shsize').val(response.school.shsize)
               $('#edit_bank_name').val(response.school.bank_name)
               $('#edit_bank_account').val(response.school.bank_account)
               $('#edit_inv_part').val(response.school.inv_part)
               $('#edit_sms_access2').val(response.school.sms_access2)
               $('#edit_test1').val(response.school.test1)
               $('#edit_test2').val(response.school.test2)
               $('#edit_test3').val(response.school.test3)
               $('#edit_test4').val(response.school.test4)
               $('#edit_inv_access_day').val(response.school.inv_access_day)
               $('#edit_spend_access').val(response.school.spend_access)
               $('#edit_atten_group_access').val(response.school.atten_group_access)
               $('#edit_atten_section_access').val(response.school.atten_section_access)
               $('#edit_subscribe').val(response.school.subscribe)
               $('#edit_payment_duration').val(response.school.payment_duration)
               $('#edit_created_date').val(response.school.created_date)
               $('#edit_expired_date').val(response.school.expired_date)


                }
             
             }); 
          });





       });
        
</script>



<!-- Modal  ADD-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">School Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('maintain/schoolinsert')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

      <div class="form-group col-sm-6  my-2">
               <label><b>Select logu Image (200*200px)<span style="color:red;"> * </span></b></label>
              <input type="file" name="image" id="image" required/>
      </div> 

			  
         <div class="form-group col-sm-6    my-2">
               <label class=""><b>School Name<span style="color:red;"> * </span></b></label>
               <input type="text" name="school" class="form-control" required>
          </div> 

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>EIIN <span style="color:red;"> * </span></b></label>
               <input type="number" name="eiin" class="form-control" required>
          </div> 
			  
         <div class="form-group col-sm-6   my-2">
               <label class=""><b>address <span style="color:red;"> * </span></b></label>
               <input type="text" name="address" class="form-control" required>
          </div> 


          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Phone Number <span style="color:red;"> * </span></b></label>
               <input type="text" name="school_phone" class="form-control" required>
          </div> 

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>E-mail <span style="color:red;"> * </span></b></label>
               <input type="email" name="email" class="form-control" required>
          </div> 

          <div class="form-group col-sm-4   my-2">
                <label class=""><b>Teacher Phone Number <span style="color:red;"> * </span></b></label>
                 <input type="text" name="teacher_phone" class="form-control" required>
          </div>

          <div class="form-group col-sm-3   my-2">
               <label class=""><b> Subscribe M <span style="color:red;"> * </span></b></label>
               <input type="number" name="subscribe" class="form-control" required>
          </div>

          <div class="form-group col-sm-2   my-2">
               <label class=""><b> Payment <span style="color:red;"> * </span></b></label>
               <input type="number" name="payment" class="form-control" required>
          </div>

          <div class="form-group col-sm-3   my-2">
               <label class=""><b> P Duration M <span style="color:red;"> * </span></b></label>
               <input type="number" name="payment_duration" class="form-control" required>
          </div>



          <div class="form-group  col-sm-4  my-2">
               <label class=""><b>payment_details<span style="color:red;"> * </span></b></label>
               <input type="text" name="payment_details"  class="form-control" required>
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Section description<span style="color:red;"> * </span></b></label>
               <input type="text" name="section_des"  class="form-control" >
          </div>

          
          <div class="form-group col-sm-2   my-2">
               <label class=""><b>Year <span style="color:red;"> * </span></b></label>
               <input type="number" name="year" class="form-control" required>
          </div>

        

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Sheet Name Size <span style="color:red;"> *23 </span></b></label>
               <input type="number" name="mnsize" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Admit Name Size <span style="color:red;"> *22 </span></b></label>
               <input type="number" name="ansize" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>S Address Size <span style="color:red;"> *18 </span></b></label>
               <input type="number" name="sasize" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>S Header S <span style="color:red;"> * 19</span></b></label>
               <input type="number" name="shsize" class="form-control" required>
          </div> 


          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Image Access</b></label>
               <select class="form-select" name="image_access" aria-label="Default select example" required>
                      <option value="No">No</option> 
                      <option value="Yes">Yes</option>
                    
           </select>
          </div>


          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Attendance Access</b></label>
               <select class="form-select" name="atten_access" aria-label="Default select example" required>
                       <option value="No">No</option> 
                       <option value="Yes">Yes</option>
           </select>
          </div>


          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>SMS Access</b></label>
               <select class="form-select" name="sms_access" aria-label="Default select example" required>
                      <option value="No">No</option> 
                      <option value="Yes">Yes</option>
           </select>
          </div>

          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Finance Access</b></label>
               <select class="form-select" name="fin_access" aria-label="Default select example" required>
                       <option value="No">No</option> 
                       <option value="Yes">Yes</option>
           </select>
          </div>

        


          
          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Agent id</b></label>
               <input type="text" name="aid" class="form-control" required>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Agent Name</b></label>
               <input type="text" name="aname" class="form-control" required>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Agent Phone</b></label>
               <input type="text" name="aphone" class="form-control" required>
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Agent E-mail</b></label>
               <input type="text" name="aemail" class="form-control" required>
          </div>


         


          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>text1</b></label>
               <input type="text" name="text1"  class="form-control" >
          </div>
         

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>text2</b></label>
               <input type="text" name="text2"  class="form-control" >
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>text 3</b></label>
               <input type="text" name="text3"  class="form-control" >
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>text 4</b></label>
               <input type="text" name="text4"  class="form-control" >
          </div>

          <div class="form-group  col-sm-12  my-2">
               <label class=""><b>Details Address</b></label>
               <input type="text" name="address_details"  class="form-control" >
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



<!-- Modal  Edit-->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">School Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('maintain/schoolupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

      <div class="form-group col-sm-6  my-2">
               <label><b>Select logu Image (200*200px)</b></label>
              <input type="file" name="image" id="image" accept="jpeg,jpg,png"/>
      </div> 

        <input type="hidden" name="edit_id" id="edit_id"  class="form-control">
			  
         <div class="form-group col-sm-6    my-2">
               <label class=""><b>School Name</b></label>
               <input type="text" id="edit_school" name="school" class="form-control" required>
          </div> 

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>EIIN</b></label>
               <input type="number" id="edit_eiin" name="eiin" class="form-control" required>
          </div> 
			  
         <div class="form-group col-sm-6   my-2">
               <label class=""><b>address</b></label>
               <input type="text" id="edit_address" name="address" class="form-control" required>
          </div> 


          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Phone Number</b></label>
               <input type="text" id="edit_school_phone" name="school_phone" class="form-control" required>
          </div> 

          

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Password</b></label>
               <input type="text" id="edit_school_pass" name="school_pass" class="form-control" required>
          </div> 

        

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>E-mail</b></label>
               <input type="email" id="edit_email" name="email" class="form-control" required>
          </div> 

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Admin Password</b></label>
               <input type="text" id="edit_admin_pass" name="admin_pass" class="form-control" required>
          </div> 

          <div class="form-group col-sm-4   my-2">
                <label class=""><b>Teacher Phone Number <span style="color:red;"> * </span></b></label>
                 <input type="text" name="teacher_phone" id="edit_teacher_phone"  class="form-control" required>
          </div>

          

          <div class="form-group col-sm-3   my-2">
               <label class=""><b> Subscribe M <span style="color:red;"> * </span></b></label>
               <input type="number" name="subscribe"  id="edit_subscribe" class="form-control" required>
          </div>

          <div class="form-group col-sm-2   my-2">
               <label class=""><b> Payment <span style="color:red;"> * </span></b></label>
               <input type="number" name="payment"  id="edit_payment" class="form-control" required>
          </div>

          <div class="form-group col-sm-3   my-2">
               <label class=""><b> P Duration M <span style="color:red;"> * </span></b></label>
               <input type="number" name="payment_duration"  id="edit_payment_duration" class="form-control" required>
          </div>


          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Current Year <span style="color:red;"> * </span></b></label>
               <input type="number" name="year" id="edit_year" class="form-control" required>
          </div>


         
          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>payment_details<span style="color:red;"> * </span></b></label>
               <input type="text" name="payment_details" id="edit_payment_details"  class="form-control" required>
          </div>

          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Section description<span style="color:red;"> * </span></b></label>
               <input type="text" name="section_des" id="edit_section_des"   class="form-control" >
          </div>

          <div class="form-group  col-sm-3 my-2">
               <label class=""><b>Inc acc Day <span style="color:red;"> * </span></b></label>
               <input type="number" name="inv_access_day" id="edit_inv_access_day"   class="form-control" >
          </div>


          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Sheet Name Size <span style="color:red;"> *23 </span></b></label>
               <input type="number" name="mnsize" id="edit_mnsize" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Admit Name Size <span style="color:red;"> * 22</span></b></label>
               <input type="number" name="ansize" id="edit_ansize" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>S Address Size <span style="color:red;"> * 17</span></b></label>
               <input type="number" name="sasize" id="edit_sasize" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>S Header S <span style="color:red;"> * 18</span></b></label>
               <input type="number" name="shsize" id="edit_shsize" class="form-control" required>
          </div> 



          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Bank Name  </span></b></label>
               <input type="text" name="bank_name" id="edit_bank_name" class="form-control" >
          </div> 

            <div class="form-group col-sm-3   my-2">
               <label class=""><b>Bank Account </b></label>
               <input type="number" name="bank_account" id="edit_bank_account" class="form-control" >
            </div> 

            <div class="form-group col-sm-3   my-2">
               <label class=""><b>Invoice Part <span style="color:red;">*</span></b></label>
               <input type="text" name="inv_part" id="edit_inv_part" class="form-control" >
            </div> 

            <div class="form-group col-sm-3   my-2">
                   <label class=""><b>SMS Access 2 </b></label>
                   <select class="form-select" name="sms_access2" id="edit_sms_access2" aria-label="Default select example" >
                       <option value="No">No</option> 
                       <option value="Yes">Yes</option>
                   </select>
            </div> 


            <div class="form-group col-sm-3   my-2">
               <label class=""><b>Tes main name <span style="color:red;"> *23 </span></b></label>
               <input type="number" name="test1" id="edit_test1" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Tes main addr <span style="color:red;"> * 22</span></b></label>
               <input type="number" name="test2" id="edit_test2" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Tes Shor name<span style="color:red;"> * 17</span></b></label>
               <input type="number" name="test3" id="edit_test3" class="form-control" required>
          </div> 

          <div class="form-group col-sm-3   my-2">
               <label class=""><b>Tes Short Addr <span style="color:red;"> * 18</span></b></label>
               <input type="number" name="test4" id="edit_test4" class="form-control" required>
          </div> 



          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Image Access</b></label>
               <select class="form-select" name="image_access" id="edit_image_access" aria-label="Default select example" required>
                      <option value="No">No</option> 
                      <option value="Yes">Yes</option>
                    
           </select>
          </div>


          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Attendance Access</b></label>
               <select class="form-select" name="atten_access" id="edit_atten_access" aria-label="Default select example" required>
                       <option value="No">No</option> 
                       <option value="Yes">Yes</option>
           </select>
          </div>


          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>SMS Access</b></label>
               <select class="form-select" name="sms_access" id="edit_sms_access" aria-label="Default select example" required>
                      <option value="No">No</option> 
                      <option value="Yes">Yes</option>
           </select>
          </div>

          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Finance Access</b></label>
               <select class="form-select" name="fin_access" id="edit_fin_access" aria-label="Default select example" required>
                    <option value="No">No</option> 
                    <option value="Yes">Yes</option>
           </select>
          </div>



          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Spend Access</b></label>
               <select class="form-select" name="spend_access" id="edit_spend_access" aria-label="Default select example" required>
                    <option value="No">No</option> 
                    <option value="Yes">Yes</option>
           </select>
          </div>


          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Atten group  Access</b></label>
               <select class="form-select" name="atten_group_access" id="edit_atten_group_access" aria-label="Default select example" >
                    <option value="">No</option> 
                    <option value="Yes">Yes</option>
           </select>
          </div>
        

          <div class="form-group  col-sm-3  my-2">
               <label class=""><b>Atten Section Access</b></label>
                 <select class="form-select" name="atten_section_access" id="edit_atten_section_access" aria-label="Default select example" >
                    <option value="">No</option> 
                    <option value="Yes">Yes</option>
                 </select>
          </div>
        
        
         <div class="form-group col-sm-6   my-2">
               <label class=""><b>Invoice Created Date  </b></label>
               <input type="date" name="created_date" id="edit_created_date" class="form-control" required>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Expired Date  </b></label>
               <input type="date" name="expired_date" id="edit_expired_date" class="form-control" required>
          </div>
        
         

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Agent id</b></label>
               <input type="text" name="aid" id="edit_aid" class="form-control" required>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Agent Name</b></label>
               <input type="text" name="aname" id="edit_aname" class="form-control" required>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Agent Phone</b></label>
               <input type="text" name="aphone" id="edit_aphone" class="form-control" required>
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Agent E-mail</b></label>
               <input type="text" name="aemail" id="edit_aemail" class="form-control" required>
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Text 1</b></label>
               <input type="text" name="text1" id="edit_text1"  class="form-control" >
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Text 2</b></label>
               <input type="text" name="text2" id="edit_text2"  class="form-control" >
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>Text 3 </b></label>
               <input type="text" name="text3" id="edit_text3" class="form-control" >
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b>text 4</b></label>
               <input type="text" name="text4" id="edit_text4"  class="form-control" >
          </div>

          <div class="form-group  col-sm-12  my-2">
               <label class=""><b>Details Address</b></label>
               <input type="text" name="address_details" id="edit_address_details" class="form-control" >
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




<!-- Modal View-->
<div class="modal fade" id="viewmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">School View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
     
       <div class="my-2"> <label>School <b id='school'></b></label> </div>
       
       <div class="my-2"> <label>Address <b id='address'></b></label> </div>   

      <div class="my-2"> <label>EIIN <b id='eiin'></b></label></div>   

      <div class="my-2"> <label>School Phone <b id='school_phone'></b></label></div>   

      <div class="my-2"> <label>Teacher Phone <b id='teacher_phone'></b></label></div>   

      <div class="my-2"> <label>Emial <b id='email'></b></label></div>   

      <div class="my-2"> <label>School Password <b id='school_pass'></b></label></div>   

      <div class="my-2"> <label>Admin Password <b id='admin_pass'></b></label></div>   

     <div class="my-2"> <label>Yearly Payment <b id='payment'></b></label></div>   

     <div class="my-2"> <label>Payment Details <b id='payment_details'></b></label></div>   

     <div class="my-2"> <label>Marksheet school name size(mnsize)<b id='mnsize'></b></label></div> 

     <div class="my-2"> <label>Admit school name size(ansize)<b id='ansize'></b></label></div> 

     <div class="my-2"> <label>Address school name size(sasize)<b id='sasize'></b></label></div> 

     <div class="my-2"> <label>Header school name size(shsize)<b id='shsize'></b></label></div> 

     <div class="my-2"> <label>Bank Name<b id='bank_name'></b></label></div>   

     <div class="my-2"> <label>Bank Account <b id='bank_account'></b></label></div>  

     <div class="my-2"> <label>Invoice Part  <b id='inv_part'></b></label></div>  

     <div class="my-2"> <label>Agent Id<b id='aid'></b></label></div>   

     <div class="my-2"> <label>Agent Name <b id='aname'></b></label></div> 
     
     <div class="my-2"> <label>Agent Phone<b id='aphone'></b></label></div>   

     <div class="my-2"> <label>Agent Email <b id='aemail'></b></label></div>   

    <div class="my-2"> <label>Text 1(text1)<b id='text1'></b></label></div>   

    <div class="my-2"> <label>Text 2(text2) <b id='text2'></b></label></div>  
    
    <div class="my-2"> <label>Text 3(text3)<b id='text3'></b></label></div>   

     <div class="my-2"> <label>Text 4(text4)<b id='text4'></b></label></div>   
     <div class="my-2"> <label>image_access , sms_access , sms_access2, fin_access , atten_access ,
          test1=Tes main name, test2=test main addres, test3=tes short name, test4=testi short address<b id='image_access'></b></label></div>   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






<!-- Modal Edit Status -->
<div class="modal fade" id="statusmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Status Change</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="post" action="{{url('maintain/status')}}"  class="myform"  enctype="multipart/form-data" >
         {!! csrf_field() !!}

        

         <div class="form-group  my-2">
         <label class=""><b>Status Type</b></label>
          <select class="form-select"  name="type" aria-label="Default select example" required>
                 <option selected>Select One</option>
                 <option value="school_status">School status</option>
                 <option value="admin_status">Admin Status</option> 
           </select>
         </div> 
			
          
        <div class="form-group  mb-4">
        <label class=""><b>Status</b></label>
          <select class="form-select"  name="status" aria-label="Default select example" required>
                 <option selected>Select One</option>
                 <option value="1">Active</option>
                 <option value="0">Deactive</option> 
           </select>
       </div>   

    <input type="submit"   id="insert" value="Update" class="btn btn-success" />
	  
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal Edit Admin Password -->
<div class="modal fade" id="adminmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Admin Password  Change</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="post" action="{{url('maintain/adminpass')}}"  class="myform"  enctype="multipart/form-data" >
         {!! csrf_field() !!}

        

         <div class="form-group  my-2">
         <label class=""><b>Admin Password</b></label>
         <input type="text" name="admin_pass"  class="form-control" required >
         </div> 
			
          
       

    <input type="submit"   id="insert" value="Update" class="btn btn-success" />
	  
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








   
   
     


@endsection