@extends('student/dashboardheader')
@section('content')

                        <h4 class="mt-4">Payment  View</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                      
                    
                    
                   
                        <div class="card-block table-border-style">                     
   <div class="table-responsive">
     <table class="table table-bordered" id="employee_data">
       <thead>
        <tr>
           <th width="5%"  >Invoice Id</th>
           <th width="5%"  >Invoice Month</th>
           <th width="10%" >Student Id</th>
           <th width="5%" >Roll </th>
           <th width="5%" >Class </th>
           <th width="5%" >Group </th>
           <th width="10%" >Pre month Due </th>
           <th width="10%" >Current Month Budget </th>
           <th width="10%" >Current Month Payment </th>
           <th width="10%" >Payment Time </th>
           <th width="10%" >Status </th>
        
       </tr>
     </thead>
     <tbody>

	 @foreach($invoice as $row)
	   <tr>
           <td>{{$row->id}}</td>
           <td> <?php echo date('F-Y',strtotime($row->invoice_date)) ?> </td>
           <td>{{$row->stu_id}}</td>
           <td>{{$row->roll}}</td>
           <td>{{$row->class}}</td>
           <td>{{$row->babu}}</td>
           <td>{{$row->pre_monthdue}}</td>
           <td>{{$row->totalamount}}</td>
           <td>{{$row->cur_monthpayment}}</td>
           <td>{{$row->payment_time}}</td>

          
        
       <td>
    
                 @if($row->status==1)
                     <button type="button" name="view" data-status="1" id="{{$row->id}}" class="btn btn-success btn-sm "> Paid </button>  
                  @else 
                     <button type="button" name="view" data-status="0" id="{{$row->id}}" class="btn btn-danger btn-sm "> Not Paid </button>  
                  @endif
       </td>
        
           
	  </tr>
      @endforeach	 
	 </tbody>
    </table>

   <script>  
      $(document).ready(function(){  
         $('#employee_data').DataTable({
            "order": [[ 0, "desc" ]] ,
	       "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
           }
	    );  
       });  
   </script>  
</div>
</div>

    

        

       
         
 






@endsection