<!DOCTYPE html>
<html>
<head>
<style>

table, td, th{  
      border:1px solid black;
		 	border-collapse:collapse;     
}

table {
  border-collapse: collapse;
  *width: 100%;
}

th, td {
  padding:3px;
  font-size:15px;
}
</style>
</head>
<body>



<center>
<h2>Ancova School Management Software </h2>
<h4>Invoice Summary of SMS Information</h4>

   <p> Invoice Month : <?php echo date('F-Y',strtotime($monthyear)); ?> , Status : @if($status==1) Paid @else Not Paid @endif</p>
  
</center>

  <table>
       <tr>
           <th align="left" width="30">EIIN </th>
           <th align="left" width="100">School</th>
           <th align="left" width="65">Phone</th>
           <th align="left" width="60">requested date</th>
           <th align="left" width="60">Payment Date</th>
           <th align="left" width="40">SMS No</th>
           <th align="left" width="40">Payment</th>
	        <th align="left" width="45">Payment Type</th>
      </tr>
  
   @foreach($invoice as $row)
     <tr>
         <td align="left" >{{$row->eiin}}</td>
         <td align="left" >{{schoolinfo($row->eiin,'school')}}</td>
         <td align="left" >{{schoolinfo($row->eiin,'school_phone')}}</td>
         <td align="left" >{{$row->created_at}}</td>
		   <td align="left" >{{$row->payment_date}}</td>
         <td align="left" >{{$row->smsno}}</td>
         <td align="left" >{{$row->payment}}TK</td>
         <td align="right"> {{$row->payment_type}}</td>
		    
    </tr>
  @endforeach

   <tr>
      <td colspan="5"> Total Amount</td>
      <td colspan="3">{{$invoice->sum('payment')}}TK</td>
   </tr>


 
  
  
</table>

</body>
</html>


