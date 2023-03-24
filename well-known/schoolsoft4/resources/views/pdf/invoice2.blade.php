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
<h2> {{$school->school}}</h2>
<h4>Invoice Summary</h4>

   <p> Invoice Month : <?php echo date('F-Y',strtotime($monthyear)); ?> , Status : @if($status==1) Paid @else Not Paid @endif</p>
  
</center>

<table>
   <tr>
        <th align="left" width="40">Stu ID</th>
        <th align="left" width="30">Class</th>
        <th align="left" width="30">Group</th>
        <th align="left" width="25">Roll</th>
        <th align="left" width="20">Sec</th>
	      <th align="left" width="140">Name</th>
        <th align="center" width="40">Pre Due</th>
        <th align="center" width="40"> Bugdet </th>
        <th align="left" width="50">Payment</th>
      
   </tr>
  
   @foreach($invoice as $row)
    <tr>
         <td align="left" >{{$row->stu_id}}</td>
         <td align="left" >{{$row->class}}</td>
         <td align="left" >{{$row->babu}}</td>
		    <td align="left" >{{$row->roll}}</td>
         <td align="left" >{{$row->section}}</td>
	       <td align="left"><?php echo substr($row->name,0,25); ?></td>
         <td align="right"> {{$row->pre_monthdue}}TK </td>
         <td align="right"> {{$row->totalamount}}TK</td>
         <td align="right"> {{$row->cur_monthpayment}}TK </td>
     
		    
 </tr>
  @endforeach

   <tr>
      <td colspan="5"> Total Amount</td>
      <td colspan="4">{{$invoice->sum('cur_monthpayment')}}TK</td>
   </tr>


 
  
  
</table>

</body>
</html>


