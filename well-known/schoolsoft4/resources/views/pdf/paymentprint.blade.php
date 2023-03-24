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
  padding:4px;
  font-size:16px;
}
 .topheader{
   text-align:right;
   font-size:23px;
   padding:8px;
 }

 .midheader{
   font-size:19px;
   padding:10px;
 }

 .rayhan {
       position: absolute;
       left:10px;
       top:0px;
       z-index: -1;
       opacity: .9;
     }	   

</style>
</head>
<body>


<div class="rayhan">
    <img src="{{ public_path("/images/ancova.jpg")}}" style="width:300px; height:300px;"/>
  </div>
          <br><br>
     <p class="topheader">Software Development, Data analysis <br>
        And Research Center <br>
        Dhaka-1000 <br>
        www.ancovabd.com<br>
        Phone:01750360044</p>

        <p class="midheader">
          Instutution Name :<b> {{$school->school}}</b> <br>
          Phone : <b> {{$school->school_phone}}</b> <br>
          E-mail : <b> {{$school->email}}</b> <br>
          EIIN : <b> {{$school->eiin}}</b> <br>

        </p>
<br>
         <h2 align="center"> Payment Order Summary </h2>
      <br><br>

 <table align="center">
      <tr hight="30" >
          <th align="left" width="70">Invoice date</th>
          <th align="left" width="150">Description</th>
          <th align="left" width="70">Payment Time</th>
          <th align="left" width="80">Pyament Type</th>
	        <th align="right" width="50">Amount</th>
     </tr>
   
   @foreach($invoice as $row)
      <tr height="30">
           <td> {{$row->created_date}}</td>
           <td> {{$row->des1}}</td>
           <td> {{$row->payment_time}}</td>
           <td> {{$row->payment_type}}</td>
           <td align="right"> {{$row->payment}}TK</td>
       </tr>

       <tr height="30">
           <td> </td>
           <td> {{$row->des2}}</td>
           <td> </td>
           <td> </td>
           <td align="right"> </td>
       </tr>
  

      <tr  height="30">
          <td> Total Amount</td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td align="right">  {{$row->payment}}TK</td>
      </tr>
      @endforeach
  
</table>

<br><br><br>
     <p><b>N.B.</b> No signature required. This payment invoice auto generate.</p>

</body>
</html>


