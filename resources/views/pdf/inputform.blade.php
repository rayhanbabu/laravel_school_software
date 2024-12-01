<!DOCTYPE html>
<html>
<head>
<style>

table, td, th{  
  border:1px solid {{$color->color6}};
		 	border-collapse:collapse;
       color:{{$color->color5}}
}

table {
  border-collapse: collapse;
  *width: 100%;
}

th, td {
  padding:4px;
  font-size:16px;
}
</style>
</head>
<body>

<center>
 
<h2> {{$school->school}}</h2>
<h4>Marks Input Form of {{examName($examinfo->exam)}}-{{$examinfo->year}}</h4>

   <p>Class: {{$class}} , Group: {{$babu}} , Section: {{$section}} </P>
</center>
     <p>Name Of Subject : </p>

<table>
   <tr>
        <th align="left" width="60">Stu ID</th>
        <th align="left" width="30">Roll</th>
	      <th align="left" width="190">Name</th>
        <th align="center" width="40">Assessment 100</th>
        <th align="center" width="40">Learning 30</th>
        <th align="left" width="50">Practical</th>
        <th align="center" width="60">Comment</th>
   </tr>
  
  @foreach($student as $row)
    <tr>
         <td align="left" >{{$row->stu_id}}</td>
		     <td align="left" >{{$row->roll}}</td>
	       <td align="left"><?php echo substr($row->name,0,25); ?></td>
         <td align="center"></td>
         <td align="center"></td>
         <td align="center"></td>
         <td align="center"></td>
		    
 </tr>
  @endforeach

 
  
  
</table>

</body>
</html>


