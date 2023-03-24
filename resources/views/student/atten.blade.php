@extends('student/dashboardheader')
@section('content')

      <h4 class="mt-4">Attendance View</h4>
                
          
                    
                    
                    
         
           <div class="card-block table-border-style">                     
   <div class="table-responsive">
     <table class="table table-bordered" id="employee_data">
       <thead>
        <tr>
           <th width="5%"  >Date </th>
           <th width="5%"  >Class </th>
           <th width="10%" >Group </th>
           <th width="10%" >Section </th>
           <th width="10%" >Status </th>
       </tr>
     </thead>
     <tbody>

	 @foreach($atten as $row)
	   <tr>
       
           <td> <?php echo date('d-F-Y',strtotime($row->date)) ?> </td>
           <td>{{$row->class}}</td>
           <td>{{$row->babu}}</td>
           <td>{{$row->section}}</td>
        
       <td>
    
                 @if($row->status==1)
                     <button type="button" name="view" data-status="1" id="{{$row->id}}" class="btn btn-success btn-sm "> Present </button>  
                  @else 
                     <button type="button" name="view" data-status="0" id="{{$row->id}}" class="btn btn-danger btn-sm "> Absence </button>  
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