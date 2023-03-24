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
  font-size:16px;
}
</style>
</head>
<body>

<center>

<h2> {{$school->school}}</h2>
<h4> Spend Summary Monthly</h4>

   <p> Spend Summary  : {{$month1}} </p>
  
</center>

  <table>

       <tr>
            <th align="left" width="100">Day</th>
            <th align="left" width="100">Total item</th>
            <th align="left" width="100">Amount</th>
       </tr>

        @foreach($spend as $row)
            <tr>
                <td>{{$row->day}}</td>
                <td align="right">{{$row->id_total}}</td>
                <td align="right">{{$row->spend_total}}TK</td>
            </tr>
        @endforeach

      <tr>
           <td colspan="2"> Total Spend</td>
           <td colspan="1" align="right">{{$spend->sum('spend_total')}}TK</td>
      </tr>

   </table>

   

</body>
</html>


