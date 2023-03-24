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
@if(Session::has('school'))   
<h2> {{Session::get('school')->school}}</h2>
<h4>Payment Summary</h4>
@endif 
   <p> Payment Day : {{$date1}} </P>
</center>

<table>
   <tr>
        <th align="left" width="60">Stu ID</th>
        <th align="left" width="30">Roll</th>
        <th align="left" width="30">Section</th>
	      <th align="left" width="190">Name</th>
        <th align="center" width="40">Pre Due</th>
        <th align="center" width="40"> Bugdet </th>
        <th align="left" width="50">Payment</th>
      
   </tr>
  
   @foreach($invoice as $row)
    <tr>
         <td align="left" >{{$row->stu_id}}</td>
		     <td align="left" >{{$row->roll}}</td>
         <td align="left" >{{$row->section}}</td>
	       <td align="left"><?php echo substr($row->name,0,25); ?></td>
         <td align="right"> {{$row->pre_monthdue}}TK </td>
         <td align="right"> {{$row->totalamount}}TK</td>
         <td align="right"> {{$row->cur_monthpayment}}TK </td>
     
		    
 </tr>
  @endforeach

   <tr>
      <td colspan="4"> Total Amount</td>
      <td colspan="3">{{$invoice->sum('cur_monthpayment')}}TK</td>
   </tr>


 
  
  
</table>

</body>
</html>


