@extends('admin/dashboardheader')
@section('content')

         <div class="row mt-3 mb-0 mx-2">
               <div class="col-6"> <h4 class="mt-0">Calculation Edit  </h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                         </div>
                     </div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex "> 
                         <a class="btn btn-primary" href="{{url('/calculationinfo')}}">Back</a>
                </div>
         </div> 

       
 </div>

  <div class="row mt-3 mb-0 mx-2  ">
    <div class="col-9"> 
       <form  method="POST" id="add_employee_form" enctype="multipart/form-data">
           <div class="row">  
                     <h3>Class: {{$class}}, Group: {{$babu}}</h3>
            
                 <input type="hidden" name="edit_id"  value="{{$id}}">
                 <div class="col-lg-10 my-2 shadow py-3 px-3">     
                                    <select class="js-example-basic-multiple form-control"  name="subcode[]" id="subcode" multiple="multiple">                       
                                @foreach($subject as $row)
                                    <option  value="{{$row->subid}}"
                                    @foreach($subcode as $row1){{ $row1==$row->subid ? 'selected': ''}}   @endforeach  > {{$row->subject}}</option>
                                 @endforeach  
                </select>
          <p class="text-danger err_author_name"></p>
                  
        
        


               <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
              </div>

                    <div class="mt-4">
               <button type="submit" id="add_btn" class="btn btn-primary">Submit </button>
                      </div> 

                </div>

               </form>
 
            </div>
       </div>
   </div>



		 

<script>  
  $(document).ready(function(){ 

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    
    $('.js-example-basic-multiple').select2();
    $('.js-example-basic-single').select2();
    
       // add new employee ajax request
      
     let formData=new FormData($('#add_form')[0]);
  
       $("#add_employee_form").submit(function(e) {
        e.preventDefault();

       
      
        const fd = new FormData(this);

       
        $.ajax({
          type:'POST',
          url:'/calculation/update',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend : function()
               {
               $('.loader').show();
               $("#add_btn").prop('disabled', true);
               },
          success: function(response){
            if(response.status == 100){
                Swal.fire("Updated",response.message, "success");
                $("#add_employee_btn").text('Submit');
                // console.log(response.message);
                $("#add_employee_form")[0].reset();
                 window.location.href ='/calculationinfo'
              }else if(response.status == 600){
                $('.err_publisher_name').text(response.message);
              }
            $('.loader').hide();
            $("#add_btn").prop('disabled', false);
          }
        });

       
      });


    });


      
</script>



@endsection     