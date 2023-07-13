@extends('school/schoolheader')
@section('monthly-invoice','active')
@section('content')
             <div class="row mt-0 mb-0 mx-2">
                     <div class="col-sm-6 my-1"> 
                          <h4>Monthly Payment Edit</h4>
                     </div>

                     <div class="col-sm-3 my-1">       
                     </div>

                     <div class="col-sm-3 my-1">         
                     </div>

             </div>
                 
   
                 <div class="form-group  mx-3 my-3">
                       @if(Session::has('success'))
                   <div  class="alert alert-success"> {{Session::get('success')}}</div>
                       @endif
                           @if(Session::has('fail'))
                   <div  class="alert alert-danger"> {{Session::get('fail')}}</div>
                           @endif
                             </div>

   <form method="get"  id="email_form"    enctype="multipart/form-data" > 
   <div class="row mt-3 mb-0 mx-2">

                  <div class="col-sm-2 my-2"> 
                              <select class="form-control"  id="class"   name ="class"  required>
				                            <option  value="">Select Class </option>
                                      @foreach($classrow as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                                      @endforeach 					
		                          </select>
                  </div>

                   
                  <div class="col-sm-2 my-2"> 
                          
                               <select class="form-control" id="group"  name ="group"  required>
                                     <option  value="">Select Group </option>
                                            @foreach($grouprow as $row)
                                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                                            @endforeach 	   					
			                          </select>
                            
                  </div>

              <div class="col-sm-2 my-2">                
                             <select class="form-control" id="section"  name ="section" required >
                                      <option  value="">Select Section </option>
                                      @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                     @endforeach					
			                       </select>                    
              </div>

          <div class="col-sm-2 my-2"> 
               <input type="date"  id="date" name="date" autocomplete="off"  class="form-control "  required>
          </div>

          <input type ="hidden" name="action" id="action" value="show">

          <div class="col-sm-2 my-2"> 
                <button  type="submit" id="add_employee_btn" class="btn btn-primary my-1"> Submit </button>
          </div>
   
      @if($action!='')
           <div class="col-sm-2 my-2">  </div>
           <div class="col-sm-8 my-2">  Class: <b>{{$class }}</b>, Group: <b>{{$group }}</b>, Section: <b>{{$section }}</b>,Invoice Date: <b>{{$date }}</b>  </div>
       @endif   
         </div> 
         
            @if($fail!="")
                   <div  class="alert alert-danger"> {{$fail}}</div>
             @endif
  </form>

  <div class="container">
  <div class="table-responsive">
        <table class="table table-bordered table-sm text-start align-middle" id="employee_data">
        <thead>       
            <tr>
                  <th>Stu ID</th>
                  <th>Roll</th>
                  <th>Name</th>  
                  <th>Invoice Month</th>  
                  <th>Payment time</th> 
                  <th>Payment Type</th>  
                  <th>Payment Amount </th> 
                  <th>Edit</th> 
                 
           </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
           <tr>
               <td>{{$row->student_id}}</td>
               <td>{{$row->roll}}</td>
               <td>{{$row->name}}</td>
               <td>{{$row->month}}-{{$row->year}}</td>
               <td>{{$row->time}}</td>
               <td>{{$row->payment_type}}</td>
               <td>{{$row->payment_amount}}</td>
               <td> <button type="button" name="view" id="{{$row->id}}" class="btn btn-success btn-sm view">Edit</button></td>
            
        </tr>
      @endforeach 
        </tbody>		 

       </table>
  </div>
</div>



<script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
              "order": [[ 0, "asc" ]] ,
	      "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
      }
	  );  
  });  
 </script> 
 

    
<script>
  $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat:"yy-mm",
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
        <h5 class="modal-title" id="staticBackdropLabel">Payment View Edit </b> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
 <form method="post" action="{{url('/payment-update')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}
   <div class="row px-3">

            <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>
        
           
            <div class="col-lg-4 my-2">
               <label for="name">Payment Amount </label>
               <input type="number" name="amount" id="edit_amount" class="form-control" placeholder=""  required>
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
             url:'/monthlyview/'+edit_id,
             success:function(response){        
                   // console.log(response)
                   $('#edit_id').val(response.data.id);
                   $("#edit_amount").val(response.data.payment_amount);
                }
             }); 
      });

});
       
</script>

     



































  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
       

@endsection     