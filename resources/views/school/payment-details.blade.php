@extends('school/schoolheader')
@section('payment-details','active')
@section('content')

     <div class="row mt-0 mb-3 mx-2">
                     <div class="col-sm-6 my-1"> 
                              <h4>Payment Details</h4>
                     </div>
    
                  <div class="col-sm-3 my-1"> 
                     <form action="{{url('/paymentday')}}" method="POST" enctype="multipart/form-data">	
                        {!! csrf_field() !!}
                         <input type="date" name="date" class="form-control" value="" required>   
                  </div>

                  <div class="col-sm-2 my-1"> 
                              <button type="submit" name="search" class="btn btn-primary"> Daily payment pdf  </button>&nbsp;&nbsp;&nbsp;
                 </div>
             </form>        
        </div>


  <div class="row my-1">
    <div class="col-md-9">
       <div id="success_message"></div>  
        @if(session('status'))
        <h5 class="alert alert-success">{{ session('status')}} </h5>
        @endif
    </div>
    <div class="col-md-3">
     <div class="form-group">
      <input type="text" name="search" id="search" placeholder="Enter Search " class="form-control"  autocomplete="off"  />
     </div>
    </div>
   </div>
				
<div class="overflow">		
<div class="x_content">
 <table id="employee_data"  class="table table-bordered table-hover">
    <thead>
       <tr>
           <th width="">Student Id</th>
           <th width="">Roll</th>
           <th width="">Name</th>
		       <th width="">Class</th>
		       <th width="">Group</th>
           <th width="">Section </th>
           <th width="">Invoice Amount</th>
		       <th width="">Payment Amount</th>
		       <th width="">Present Due</th>
           <th width="">View Details </th>
           <th width="">Pay Now</th>
      </tr>
    </thead>
    <tbody>
       
    </tbody>
  </table>
     <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
     <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="roll" />
     <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

      <input type="hidden" name="class" id="class" value="{{$class}}"/>
      <input type="hidden" name="babu" id="babu" value="{{$babu}}"/>
      <input type="hidden" name="section" id="section" value="{{$section}}"/>
 
</div>
</div>




<script>  
$(document).ready(function(){ 

  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

         fetch();
         function fetch(){
           var className=$('#class').val();
           var babu=$('#babu').val();
           var section=$('#section').val();
            $.ajax({
              type:'GET',
              url:"/payment-details-fetch?class="+className+"&babu="+babu+"&section="+section,
              datType:'json',
              success:function(response){
                     $('tbody').html('');
                     $('.x_content tbody').html(response);      
                 }
            });
         }


      function fetch_data(page, sort_type="", sort_by="", search=""){
            var className=$('#class').val();
            var babu=$('#babu').val();
            var section=$('#section').val(); 
         $.ajax({
         url:"/payment_fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&search="+search+"&class="+className+"&babu="+babu+"&section="+section,
         success:function(data)
            {
               console.log(data);
               $('tbody').html('');
               $('.x_content tbody').html(data);
            }
         });
         }
   
       
    $(document).on('keyup', '#search', function(){
        var search = $('#search').val();
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var page = $('#hidden_page').val();
        fetch_data(page, sort_type, column_name, search);
      });


      $(document).on('click', '.pagin_link a', function(event){
           event.preventDefault();
           var page = $(this).attr('href').split('page=')[1];
           var column_name = $('#hidden_column_name').val();
           var sort_type = $('#hidden_sort_type').val();
           var search = $('#serach').val();
          fetch_data(page, sort_type, column_name, search);
        }); 


        $(document).on('click', '.sorting', function(){
          var column_name = $(this).data('column_name');
          var order_type = $(this).data('sorting_type');
          var reverse_order = '';
            if(order_type == 'asc')
             {
            $(this).data('sorting_type', 'desc');
            reverse_order = 'desc';
            $('#'+column_name+'_icon').html('<i class="fas fa-sort-amount-down"></i>');
             }
            else
            {
            $(this).data('sorting_type', 'asc');
            reverse_order = 'asc';
            $('#'+column_name+'_icon').html('<i class="fas fa-sort-amount-up-alt"></i>');
            }
           $('#hidden_column_name').val(column_name);
           $('#hidden_sort_type').val(reverse_order);
           var page = $('#hidden_page').val();
           var search = $('#serach').val();
          fetch_data(page, reverse_order, column_name, search);
          });



     

          $(document).on('click', '.view_all', function(e){ 
            e.preventDefault(); 
            var uid = $(this).val(); 
            //alert(edit_id)
            $('#ViewModal').modal('show');
            $.ajax({
             type:'GET',
             url:'/payment-data-view/'+uid,
             success:function(response){

              var html="";
              var payment="";
               
                if(response.status == 404){
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-danger');
                  $('#success_message').text(response.message);
                }else{
                  $('#view_name').text(response.value.name);

                      html+='<div class="row">';
                      html+='<div class="col-sm-2">';
				              html+='<b>Date</b>';
                      html+='</div>'
                      html+='<div class="col-sm-6">';
				              html+='<b>Description</b>';
                      html+='</div>';
                      html+='<div class="col-sm-2">';
                      html+='<b>Description Amount</b>'; 
                      html+='</div>';
                      html+='<div class="col-sm-2">';
                      html+='<b>Total Amount</b>'; 
                      html+='</div>';
                      html+='<hr>';
		                  html+='</div>';

                 for(var row of response.value) {

                      html+='<div class="row">';
                      html+='<div class="col-sm-2">';
				              html+=row.date;
                      html+='</div>';
                      html+='<div class="col-sm-6">';
				              html+='1.'+row.invoice_des1+'<br>2.'+row.invoice_des2;
                      html+='</div>';
                      html+='<div class="col-sm-2">';
                      html+='1.'+row.invoice_amount1+'<br>2.'+row.invoice_amount2;
                      html+='</div>';
                      html+='<div class="col-sm-2">';
                      html+=row.invoice_amount;
                      html+='</div>';
                      html+='<hr>';
		                  html+='</div>'; 
                }

                     payment+='<div class="row">';
                     payment+='<div class="col-sm-1">';
                     payment+='<b> Payment Id</b>';
                     payment+='</div>';
                     payment+='<div class="col-sm-3">';
                     payment+='<b> Payment Time</b>';
                     payment+='</div>'
                     payment+='<div class="col-sm-3">';
                     payment+='<b> Payment Type</b>';
                     payment+='</div>';
                     payment+='<div class="col-sm-3">';
                     payment+='<b> Received Type</b>';
                     payment+='</div>';
                     payment+='<div class="col-sm-2">';
                     payment+='<b> Payment Amount</b>'; 
                     payment+='</div>';
                     payment+='<hr>';
		                 payment+='</div>';

                   for(var row of response.payment){
                          payment+='<div class="row">';
                          payment+='<div class="col-sm-1">';
                          payment+=row.id;
                          payment+='</div>'
                          payment+='<div class="col-sm-3">';
                          payment+=row.time;
                          payment+='</div>'
                          payment+='<div class="col-sm-3">';
                          payment+=row.payment_type;
                          payment+='</div>';
                          payment+='<div class="col-sm-3">';
                          payment+=row.received_type;
                          payment+='</div>';
                          payment+='<div class="col-sm-2">';
                          payment+=row.payment_amount; 
                          payment+='</div>';
                          payment+='<hr>';
		                      payment+='</div>';
                     }
                          
            
                  $("#invoice_data_view").html(html);
                  $("#payment_data_view").html(payment);
                }
             }
             });
           });



           $(document).on('click', '.payNow', function(e){ 
            e.preventDefault(); 
            var uid = $(this).val(); 
            $.ajax({
             type:'GET',
             url:'/payment-fetch/'+uid,
             success:function(response){
                console.log(response);
                if(response.status == 404){
                   $('#success_message').html("");
                   $('#success_message').addClass('alert alert-danger');
                   $('#success_message').text(response.message);
                }else{
                   $('#payNow').modal('show');
                   $('#edit_uid').val(response.value.uid);
                   $('#edit_name').val(response.value.name); 
                   $('#edit_student_id').val(response.value.student_id); 
                   $('#edit_roll').val(response.value.roll); 
                   $('#edit_class').val(response.value.class); 
                   $('#edit_section').val(response.value.section);
                   $('#edit_eiin').val(response.value.eiin);
                   $('#edit_babu').val(response.value.babu);


                   $('#student_id').text(response.value.student_id);
                   $('#name').text(response.value.name);
                   $('#roll').text(response.value.roll);
                   $('#class').text(response.value.class);
                   $('#babu').text(response.value.babu);  
                   $('#section').text(response.value.section);   
                   $('#invoice_amount').text(response.value.invoice_amount);    
                   $('#payment_amount').text(response.value.payment_amount);    
                   $('#due_payment').text(response.value.due_payment);                    
                }
             }
          });
       });



       $("#pay_form").submit(function(e) {
        e.preventDefault();
           //var invoice_id=$('#invoice_id').val();

        let payData=new FormData($('#pay_form')[0]);
        $.ajax({
             type:'POST',
             url:'/payment-create',
             data:payData,
             contentType: false,
             processData:false,
             beforeSend : function()
               {
                  $('.loader').show();
                  $("#pay_btn").prop('disabled', true);
               },
             success:function(response){
                   console.log(response);
                  if(response.status == 400){
                       $('.edit_err_dureg').text(response.validate_err.dureg);
                  }else{
                       $('#edit_form_errlist').html("");
                       $('#edit_form_errlist').addClass('d-none');
                       $('#success_message').html("");
                       $('#success_message').addClass('alert alert-success');
                       $('#success_message').text(response.message)
                       $('#payNow').modal('hide');
                       $("#pay_form")[0].reset();
                       fetch();
                    }

                  $("#pay_btn").prop('disabled', false) 
                  $('.loader').hide();
             }
          });
       });
    

       
  

 });

</script>




  <!-- Modal  Invoice Paayment  Summary -->
  <div class="modal fade" id="ViewModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Invoice  Payment Summary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
            <h5>Invoice Summary</h5>
                <div id="invoice_data_view"> </div>
               <br>
            <h5>payment Summary</h5>
                <div id="payment_data_view"> </div>     
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal  Pay Now  Summary -->
  <div class="modal fade" id="payNow"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Payment  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   <form method="post" id="pay_form" enctype="multipart/form-data">
      <div class="modal-body">
    
            <div class="row">
                   <div class="col-sm-2"> <b>Student Id</b> </div>
                   <div class="col-sm-2" id="student_id"> </div>
                   <div class="col-sm-2"> <b>Roll </b> </div>
                   <div class="col-sm-2" id="roll"> </div>
                   <div class="col-sm-2"> <b>Group </b> </div>
                   <div class="col-sm-2" id="babu"> </div>
                  <hr>
	         	</div> 

             <div class="row">
                   <div class="col-sm-2"> <b>Name</b> </div>
                   <div class="col-sm-4" id="name"> </div>
                   <div class="col-sm-1"> <b>Class </b> </div>
                   <div class="col-sm-2" id="class"> </div>
                   <div class="col-sm-1"> <b>Section </b> </div>
                   <div class="col-sm-2" id="section"> </div>
                  <hr>
	         	</div> 

             <div class="row">
                   <div class="col-sm-3"> <b>Invoice Amount</b> </div>
                   <div class="col-sm-1" id="invoice_amount"> </div>
                   <div class="col-sm-3"> <b>Payment Amount </b> </div>
                   <div class="col-sm-1" id="payment_amount"> </div>
                   <div class="col-sm-2"> <b>Payment Due </b> </div>
                   <div class="col-sm-2" id="due_payment"> </div>
                  <hr>
	         	</div> 
            <br>
      
              <input type="hidden"  name="edit_uid" id="edit_uid"> 
              <input type="hidden"  name="edit_name" id="edit_name"> 
              <input type="hidden"  name="edit_roll" id="edit_roll"> 
              <input type="hidden"  name="edit_class" id="edit_class"> 
              <input type="hidden"  name="edit_babu" id="edit_babu"> 
              <input type="hidden"  name="edit_eiin" id="edit_eiin"> 
              <input type="hidden"  name="edit_student_id" id="edit_student_id"> 
              <input type="hidden"  name="edit_section" id="edit_section"> 

             <div class="row">
                   <div class="col-sm-4"><b>Present Payment Amount</b> </div>
                   <div class="col-sm-4"><input type="number" min="0" name="payment" id="edit_payment" class="form-control" required> </div>
                   <div class="col-sm-4">
                   <button type="submit" id="pay_btn" class="btn btn-primary">Submit </button>
                  </div>
	         	</div>

             <div class="loader">
                 <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
			      </div><br>

      </form>
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



                 

@endsection