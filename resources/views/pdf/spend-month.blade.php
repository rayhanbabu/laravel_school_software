<!DOCTYPE html>
<html>
 <head>
	 <script>
 function printContent(e1){
   var restorepage= document.body.innerHTML;
   var printcontent= document.getElementById(e1).innerHTML;
   document.body.innerHTML=printcontent;
   window.print();
   document.body.innerHTML=restorepage;
  }
  
</script>

         <style>
	 table,td,th{  
  border: 1px solid #acacac;
  *text-align: left;
}

table {
  border-collapse: collapse;
  *width: 100%;
}

th, td {
  padding:3px;
  font-size:15px;
}

.area{
	
    *height:950px;
    *background-color:gray;
    width:700px;
}

.btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

.success {background-color: #4CAF50;} /* Green */
.success:hover {background-color: #46a049;}
	  	   
	  </style>	   




	</head>
<body>

   <center>
      <br>
	 <button class="btn success" onclick ="printContent('div1')">Print </button>
    <div id="div1">

    <div class="area">
  <center>
       <h2> {{$school->school}}</h2>
       <h4> Payment Summary : {{$year}} - {{$month}} </h4>
       
      
<table>
 @if($month)
        <tr>
        <th align="left" width="80">Date</th>
           <th align="left" width="200">Description</th>
           <th align="left" width="40">Quantity</th>
	         <th align="right" width="50">Per unit Amount</th>
           <th align="right" width="70">Total Amount</th>
         </tr>
      @else
      <tr>
             <th width="100">Month</th>
             <th width="100">No Of Payment</th>
             <th width="150">Payment Amount</th>
      </tr>
      @endif
  

  @foreach($invoice as $user)
    @if($month)
      <tr>
                 <td>{{$user->date}}</td>
                <td>{{$user->description}}</td>
                <td>{{$user->qty}}</td>
                <td align="right">{{$user->price}}TK</td>
                <td align="right">{{$user->total}}TK</td>
     </tr>

     @else
         <tr>
             <td align="left">{{$user->month}}</td>
		       <td align="left">{{$user->id_total}}</td>
             <td align="right">{{$user->spend_total}}TK</td>
        </tr>
     @endif
   
  @endforeach

  @if($month)
  <tr>
    <td colspan="4">  </td>
    <td  align="right"> {{$invoice->sum('total') }} TK</td>
   
  </tr>
  @else
  <tr>
    <td colspan="2">  </td>
    <td  align="right">{{$invoice->sum('spend_total') }}  TK</td>
   
  </tr>
  @endif
  
</table>


</center>

</div>	 
    </div>
		   <br>
	  	
			
</center>

</body>
</html>