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
  font-size:17px;
}
</style>
</head>
<body>

    

<center>
<h2> {{$school->school}}</h2>
<h4> Overall Summary</h4>

   <p> Ovarall Summary  : <?php echo date('F-Y',strtotime($monthyear)); ?> </p>
  
</center>


 <br>
  <p>Invoice Summary</p>

  <table>
      <tr>
           <th align="left" width="300">Total Student </th>
           <th align="right" width="200">{{$invoice->id}}</th>
      </tr>

      <tr>
          <th align="left" width="300">Previous month due </th>
          <th align="right" width="200">{{$invoice->pre_monthdue}}TK</th>
      </tr>

      <tr>
           <th align="left" width="300">Current month budget </th>
          <th align="right" width="200">{{$invoice->totalamount}}TK</th>
      </tr>
 
      <tr>
          <th align="left" width="300"> Current month invoice amount </th>
          <th align="right" width="200">{{$invoice->cur_monthpayment}}TK</th>
      </tr>
  
   </table>

    <br>
    <p>Payment  Summary</p>

    <table>
      <tr>
        <th align="left" width="300">Payment Students </th>
        <th align="right" width="200">{{$payment->id}}</th>
      </tr>

      <tr>
        <th align="left" width="300">Not Payment Student </th>
        <th align="right" width="200">{{$invoice->id - $payment->id}}TK</th>
      </tr>

      <tr>
        <th align="left" width="300">Current month invoice amount </th>
        <th align="right" width="200">{{$invoice->totalamount}}TK</th>
      </tr>
 
      <tr>
        <th align="left" width="300"> Payment amount </th>
        <th align="right" width="200">{{$payment->cur_monthpayment}}TK</th>
      </tr>

      <tr>
        <th align="left" width="300"> Not Payment  amount</th>
        <th align="right" width="200">{{$invoice->totalamount-$payment->cur_monthpayment}}TK</th>
      </tr>
  
   </table>

</body>
</html>


