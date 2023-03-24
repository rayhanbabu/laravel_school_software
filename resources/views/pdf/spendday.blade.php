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
<h4> Spend Summary</h4>

   <p> Spend Summary  : {{$day1}} </p>
  
</center>

  <table>

      <tr>
           <th align="left" width="80">Date</th>
           <th align="left" width="200">Description</th>
           <th align="left" width="40">Quantity</th>
	         <th align="right" width="50">Per unit Amount</th>
           <th align="right" width="70">Total Amount</th>
     </tr>

        @foreach($spend as $row)
            <tr>
                <td>{{$row->date}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->qty}}</td>
                <td align="right">{{$row->price}}TK</td>
                <td align="right">{{$row->total}}TK</td>
            </tr>
        @endforeach

      <tr>
           <td colspan="3"> Total Spend</td>
           <td colspan="2" align="right">{{$spend->sum('total')}}TK</td>
      </tr>

   </table>

   

</body>
</html>


