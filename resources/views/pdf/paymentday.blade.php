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
   <p> Daily Payment Summary  : {{$day1}} </p>
       
      
<table>
 
       <tr>
            <th width="">Student Id</th>
             <th width="">Roll</th>
             <th width="195">Name</th>
             <th width="">Class</th>
             <th width="">Group</th>
             <th width="">Section</th>
		         <th width="">Payment Amount</th>
             <th width="">Payment, Received Type</th>
             <th width="">Payment Time</th>
        </tr>
     

    @foreach($payment as $user)
         <tr>
             <td align="left">{{$user->student_id}}</td>
		         <td align="left">{{$user->roll}}</td>
             <td align="left">{{substr($user->name,0,20)}}</td>
             <td align="left">{{$user->class}}</td>
             <td align="left">{{$user->babu}}</td>
             <td align="left">{{$user->section}}</td>
             <td align="right">{{ $user->payment_amount}}TK</td> 
             <td align="right">{{ $user->payment_type}}, {{ $user->received_type}}</td> 
             <td align="right">{{ $user->time}}</td>     
         </tr>
     @endforeach

 
    <tr>
      <td colspan="6">  </td>
      <td  align="right">{{$payment->sum('payment_amount') }}  TK</td>
  </tr>

  
</table>


</center>

</div>	 
    </div>
		   <br>
	  	
			
</center>

</body>
</html>