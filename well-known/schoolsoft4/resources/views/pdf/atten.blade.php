<!DOCTYPE html>
<html>
<head>

<style>

table, td, th{  
  border: 1px solid #acacac;
  *text-align:left;
}

table {
  border-collapse: collapse;
  *width:100%;
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
    <h3> {{$school->address}}</h3>

    <h3>  Class : {{$class}}, Group : {{$babu}}, Section : {{$section}}, Month : <?php echo date('F-Y',strtotime($month)) ?> , Total Classes : {{$total_class}}   </h3>
 

    <table>

    <tr>
         <th align="left" rowspan="2" width="50">Stu ID </th>
         <th align="left" rowspan="2" width="30">Roll </th>
	       <th align="left" rowspan="2" width="70">Name </th>
         <th align="left" rowspan="2" width="15">Total Pre. </th>
         <th align="left" colspan="<?php echo $day->count();?>" width="10">The  day series of  <?php echo date('F-Y',strtotime($month)) ?>   </th>
        
    </tr>
      <tr>
         @foreach($day as $data)
         <th align="left" width="10"> {{$data->day}}  </th>
         @endforeach
      </tr>

      @foreach($student as $row)
        <tr>
            <td>{{studentinfo($row->uid,'stu_id')}}</td>
            <td>{{studentinfo($row->uid,'roll')}}</td>
            <td><?php echo substr(studentinfo($row->uid,'name'),0,12); ?></td>
            <td>{{$row->total_atten}}</td>
            @foreach(atten($row->uid,$row->max_month,$row->max_year) as $item)<td> {{$item->status}}</td> @endforeach
        </tr>

  @endforeach
 
      
</table>

 

</body>
</html>


