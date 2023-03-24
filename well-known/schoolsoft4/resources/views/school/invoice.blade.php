@extends('school/schoolheader')
@section('invoice','active')
@section('content')
<?php
       $x= date('j');  //Current Day
    ?>
<div class="row mt-4 mb-0">
               <div class="col-3"> <h4 class="mt-0"> Invoice  View,  Section : {{Session::get('section')}} </h4></div>
                 
                      <div class="col-1">
                           <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                              <p>Sudents : {{ $invoice->count() }} </p>
                           </div>
                      </div>

                     <div class="col-1">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                             <p>Payment : {{ $payment }}  </p>
                          </div>
                     </div>

                     <div class="col-2">
                         <div class="d-grid gap-2 d-md-flex ">
                             <p>Not Payment : {{ $invoice->count()-$payment }}  </p>
                         </div>
                     </div> 

                     <div class="col-2">
                         <div class="d-grid gap-2 d-md-flex ">
                             <form action="{{url('/paymentday')}}" method="POST" enctype="multipart/form-data">
                                   {!! csrf_field() !!}
                                   <input type="date" name="date" class="form-control" value="" required>
                                   <button type="submit" name="search" class="btn btn-primary">Daily Payment  </button>
					                     </form> 
                         </div>
                     </div> 

                     <div class="col-2">
                         <div class="d-grid gap-2 d-md-flex ">
                             @if($school->inv_access_day==$x) 
                                  <form action="{{url('/invoicemonth')}}" method="POST" enctype="multipart/form-data">
                                      {!! csrf_field() !!}
                                      <button type="submit" name="search" class="btn btn-primary">Create </button>
					                       </form> 
                             @endif    
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
           <th width="5%"  >Invoice Id</th>
           <th width="5%"  >Invoice Month</th>
           <th width="10%" >Student Id</th>
           <th width="10%" >Roll </th>
           <th width="10%" >Name </th>
           <th width="10%" >Class </th>
           <th width="10%" >Group </th>
           <th width="10%" >Pre month Due </th>
           <th width="10%" >Current Month Budget </th>
           <th width="10%" >Current Month Payment </th>
           <th width="10%" >Payment Time </th>
           <th width="10%" >Edit </th>
           <th width="10%" >Print </th>
           <th width="10%" >Status </th>
           <th width="5%"  >View</th> 
       </tr>
     </thead>
     <tbody>

	 @foreach($invoice as $row)
	   <tr>
           <td>{{$row->id}}</td>
           <td> <?php echo date('F-Y',strtotime($row->invoice_date)) ?> </td>
           <td>{{$row->stu_id}}</td>
           <td>{{$row->roll}}</td>
           <td>{{$row->name}}</td>
           <td>{{$row->class}}</td>
           <td>{{$row->babu}}</td>
           <td>{{$row->pre_monthdue}}</td>
           <td>{{$row->totalamount}}</td>
           <td>{{$row->cur_monthpayment}}</td>
           <td>{{$row->payment_time}}</td>

           <td> <button type="button" name="view" data-des6="{{ $row->des6 }}"
              data-amount6="{{ $row->amount6 }}" id="{{$row->id}}" class="btn btn-success btn-sm invoice "> Edit</button> </td>
           <td>
		   <a  class="btn btn-primary btn-sm" href="{{ url('invoicepdf'.$school->inv_part.'/'.$row->id.'/'.$row->uid)}}">Print</a> 
      </td>
        
       <td>
             @if($school->inv_access_day!=$x)
                 @if($row->status==1)
                     <button type="button" name="view" data-status="1" id="{{$row->id}}" class="btn btn-success btn-sm view"> Paid </button>  
                  @else 
                     <button type="button" name="view" data-status="0" id="{{$row->id}}" class="btn btn-danger btn-sm view"> Not Paid </button>  
                  @endif
             @endif     
       </td>
        
           <td>
             <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm edit "> View </button>
           </td>
	  </tr>
      @endforeach	 
	 </tbody>
    </table>

   <script>  
      $(document).ready(function(){  
         $('#employee_data').DataTable({
            "order": [[ 0, "asc" ]] ,
	       "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
           }
	    );  
       });  
   </script>  
</div>
</div>




 <!-- Modal  View -->
 <div class="modal fade" id="viewmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Payment Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

   <div class="modal-body">
        <form method="post" action="{{url('invoiceupdate')}}"  class="myform"  enctype="multipart/form-data" >
       {!! csrf_field() !!}
            <h4>  Are  you  sure  update  payment  status ?? </h4>
              <input type="hidden" name="invoice_id_view" id="invoice_id_view" class="form-control">
              <input type="hidden" name="status" id="status" class="form-control">

       <div class="mt-4">
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Yes </button>
       </div>  
              
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal  View -->
<div class="modal fade" id="invoice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Extra Pay Amount </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

   <div class="modal-body">
        <form method="post" action="{{url('invoicedes')}}"  class="myform"  enctype="multipart/form-data" >
         {!! csrf_field() !!}
          
          <input type="hidden" name="inv_id" id="inv_id" class="form-control">
             
           <label> Description 6 </label>   
           <input type="text" name="des6" id="inv_des6" class="form-control">
               <br>  
           <label> Amount 6 </label> 
           <input type="number" name="amount6" id="inv_amount6" class="form-control" required>

           <div class="mt-4">
              <button type="submit" id="add_employee_btn" class="btn btn-primary">Update </button>
           </div>  
              
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







 <!-- Modal  Edit -->
 <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Payment Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
 
    <div class="row">
                <div class="col-sm-10">
				Student Id :  <b id="stu_id">  </b>
                </div>
             
	 </div> 

      <div class="row">
                <div class="col-sm-10">
				Roll : <b id="roll">  </b>
                </div>
            
	 </div> 

      <div class="row">
                <div class="col-sm-10">
				Name : <b id="name">  </b>
                </div>
             <hr> 
	 </div> 

      <div class="row">
                <div class="col-sm-10">
				Invoice Id : <b id="invoice_id">  </b>
                </div>
             <hr> 
	 </div> 

  



      <div class="row">

                 <div class="col-sm-1"> Serial  </div>

                <div class="col-sm-7">
				 <b> Description </b>
                </div>
                <div class="col-sm-4">
                     <b> Price </b>
                </div>
             <hr> 
	  </div> 


       <div class="row">
               <div class="col-sm-1">  1</div>
                <div class="col-sm-7">
				 <b id="des1">  </b>
                </div>
                <div class="col-sm-4">
                     <b id="amount1">  </b>
                </div>
             <hr> 
	  </div> 


       <div class="row">
               <div class="col-sm-1">  2</div>
                <div class="col-sm-7">
				 <b id="des2">  </b>
                </div>
                <div class="col-sm-4">
                     <b id="amount2">  </b>
                </div>
             <hr> 
	  </div> 


         <div class="row">
               <div class="col-sm-1"> 3</div>
                <div class="col-sm-7">
				 <b id="des3">  </b>
                </div>
                <div class="col-sm-4">
                     <b id="amount3">  </b>
                </div>
             <hr> 
	      </div> 


       <div class="row">
                  <div class="col-sm-1"> 4 </div>
                     <div class="col-sm-7">
				   <b id="des4">  </b>
                  </div>
                  <div class="col-sm-4">
                       <b id="amount4">  </b>
                    </div>
             <hr> 
	      </div> 

       <div class="row">
               <div class="col-sm-1"> 5 </div>
                <div class="col-sm-7">
				 <b id="des5">  </b>
                </div>
                <div class="col-sm-4">
                     <b id="amount5">  </b>
                </div>
             <hr> 
	  </div> 


       <div class="row">
               <div class="col-sm-1"> 6 </div>
                <div class="col-sm-7">
				 <b id="des6">  </b>
                </div>
                <div class="col-sm-4">
                     <b id="amount6">  </b>
                </div>
             <hr> 
	  </div> 

       <div class="row">
               <div class="col-sm-1"> </div>
                <div class="col-sm-7">
				 <b > Current month budget </b>
                </div>
                <div class="col-sm-4">
                     <b id="totalamount">  </b>
                </div>
             <hr> 
	  </div> 


       <div class="row">
               <div class="col-sm-1"> </div>
                <div class="col-sm-7">
				 <b > Previous month due </b>
                </div>
                <div class="col-sm-4">
                     <b id="pre_monthdue">  </b>
                </div>
             <hr> 
	  </div> 

       <div class="row">
               <div class="col-sm-1"> </div>
                <div class="col-sm-7">
				 <b > Current  month payment </b>
                </div>
                <div class="col-sm-4">
                     <b id="cur_monthpayment">  </b>
                </div>
             <hr> 
	  </div> 



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">

      $(document).ready(function(){

      $(document).on('click','.edit',function(){
             var edit_id = $(this).attr("id");  
             $('#editmodal').modal('show');
             $.ajax({
             type:'GET',
             url:'/invoice_detail/'+edit_id,
             success:function(response){        
              // console.log(response)
                 $('#invoice_id').text(response.invoice.id)
                 $('#name').text(response.name)
                 $('#stu_id').text(response.stu_id)
                 $('#roll').text(response.roll)
                 $('#des1').text(response.invoice.des1)
                 $('#des2').text(response.invoice.des2)
                 $('#des3').text(response.invoice.des3)
                 $('#des4').text(response.invoice.des4)
                 $('#des5').text(response.invoice.des5)
                 $('#des6').text(response.invoice.des6)

                 $('#amount1').text(response.invoice.amount1)
                 $('#amount2').text(response.invoice.amount2)
                 $('#amount3').text(response.invoice.amount3)
                 $('#amount4').text(response.invoice.amount4)
                 $('#amount5').text(response.invoice.amount5)
                 $('#amount6').text(response.invoice.amount6)

                 $('#totalamount').text(response.invoice.totalamount)
                 $('#pre_monthdue').text(response.invoice.pre_monthdue)
                 $('#cur_monthpayment').text(response.invoice.cur_monthpayment)
                
          
            
                }
             }); 

          });


          $(document).on('click','.view',function(){
             var invoice_id_view = $(this).attr("id");  
             var status = $(this).data("status");  
             $('#viewmodal').modal('show');
            
              $('#invoice_id_view').val(invoice_id_view);
              $('#status').val(status);

             //alert(status);
                
          });


          $(document).on('click','.invoice',function(){
               var inv_id =$(this).attr("id");  
               var inv_des6  =$(this).data("des6");  
               var inv_amount6  =$(this).data("amount6");  
                 $('#invoice').modal('show');
               
                 $('#inv_id').val(inv_id);
                 $('#inv_des6').val(inv_des6);
                 $('#inv_amount6').val(inv_amount6);
              
               //alert(status);
                
          });
    
});
       
</script>


@endsection