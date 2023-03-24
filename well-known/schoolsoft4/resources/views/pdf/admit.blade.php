<!DOCTYPE html>
<html>
<head>
<style>
	   td,table
         {
		    border:1px solid {{$color->color2}};
			border-collapse:collapse;
            color:{{$color->color1}};
		 }
		td
		{
           padding:1px;
		  text-align:left;
		  font-family:Cambria,"Hoefler text","Liberation Serf",Times,"Times New Roman",serif;	
           font-size:15px;
           height:16px;						   
		} 
		 
		 th{
			 padding:1px;
			 text-align:left;
			 font-size:18px;
			 font-family:Cambria,"Hoefler text","Liberation Serf",Times,"Times New Roman",serif;		
		  }
			
			th span{
		   margin-left:8px;
			}
	    #school{
		   font-size:22px;
		   text-align:center;
           padding:10px;
	   }	
	    #up{
		   font-size:17px;
		   text-align:center;
	   }		
	   #exam{
		   font-size:20px;
		   text-align:center;
	   }	

     #rightside{
      margin-left:10px;
      text-align:center;
     }
     
    #footer{
      height:70px;
      text-align:right;
      font-size:15px;

    }


	  	   
	  </style>	   


</head>
<body>


@foreach($student as $row)
<table>
      <tr>
         <th id="school" colspan="8">{{Session::get('school')->school}}</th>
      </tr>
      <tr>
         <th id="up" colspan="8">{{Session::get('school')->address}}</th>
      </tr>
      <tr>
         <th id="exam"  colspan="8">Admit Card -{{$examinfo->year}}</th>
      </tr>


      <tr>
          <th width="65" ></th>
          <th width="60" ></th>
          <th width="65" ></th>
          <th width="65" ></th>
          <th width="65" ></th>
          <th width="60" ></th>
          <th width="65" ></th>
          <th width="65" ></th>
      </tr>

      <tr>
          <th id="rightside" >Name</th>
          <th  colspan="4" >: <?php echo substr($row->name,0,27); ?> </th>
          <th >Exam</th>
          <th colspan="2">: {{examName($examinfo->exam)}}</th>
      </tr>

      <tr>
          <th id="rightside">Stu ID</th>
          <th  colspan="2" >: {{$row->stu_id}}</th>
          <th >Group</th>
          <th colspan="2">: {{$row->babu}}</th>
          <th >Roll</th>
          <th >: {{$row->roll}}</th>
      </tr>

      <tr>
          <th id="rightside" >Class</th>
          <th  colspan="2">: {{$row->class}}</th>
          <th >Shift</th>
          <th colspan="2">: {{shift(Session::get('section'),Session::get('school')->eiin)}}  </th>
          <th >Section</th>
          <th >: {{Session::get('section')}}</th>
      </tr>

      <tr>
         <th id="exam" colspan="8">Exam  Routine</th>
      </tr>

      <tr>
          <td colspan="2">Date & Time</td>
          <td colspan="2">Subjects</td>
          <td colspan="2">Date & Day</td>
          <td colspan="2">Subjects</td>
      </tr>

      <tr>
          <td colspan="2"> <?php if($sub1s!=''){echo date('d/m/y',strtotime($admit->date1)).','.$admit->time1;}else{echo '';} ?> </td>
          <td colspan="2"> {{$sub1s}} </td>
          <td colspan="2"><?php if($sub2s!=''){echo date('d/m/y',strtotime($admit->date2)).','.$admit->time2;}else{echo '';} ?></td>
          <td colspan="2"> {{$sub2s}}</td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub3s!=''){echo date('d/m/y',strtotime($admit->date3)).','.$admit->time3;}else{echo '';} ?></td>
          <td colspan="2">{{$sub3s}}  </td>
          <td colspan="2"><?php if($sub4s!=''){echo date('d/m/y',strtotime($admit->date4)).','.$admit->time4;}else{echo '';} ?></td>
          <td colspan="2">{{$sub4s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub5s!=''){echo date('d/m/y',strtotime($admit->date5)).','.$admit->time5;}else{echo '';} ?></td>
          <td colspan="2">{{$sub5s}}  </td>
          <td colspan="2"><?php if($sub6s!=''){echo date('d/m/y',strtotime($admit->date6)).','.$admit->time6;}else{echo '';} ?></td>
          <td colspan="2">{{$sub6s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub7s!=''){echo date('d/m/y',strtotime($admit->date7)).','.$admit->time7;}else{echo '';} ?></td>
          <td colspan="2">{{$sub7s}}  </td>
          <td colspan="2"><?php if($sub8s!=''){echo date('d/m/y',strtotime($admit->date8)).','.$admit->time8;}else{echo '';} ?></td>
          <td colspan="2">{{$sub8s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub9s!=''){echo date('d/m/y',strtotime($admit->date9)).','.$admit->time9;}else{echo '';}?> </td>
          <td colspan="2">{{$sub9s}} </td>
          <td colspan="2"><?php if($sub10s!=''){echo date('d/m/y',strtotime($admit->date10)).','.$admit->time10;}else{echo '';} ?></td>
          <td colspan="2">{{$sub10s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub11s!=''){echo date('d/m/y',strtotime($admit->date11)).','.$admit->time11;}else{echo '';} ?></td>
          <td colspan="2">{{$sub11s}}  </td>
          <td colspan="2"><?php if($sub12s!=''){echo date('d/m/y',strtotime($admit->date12)).','.$admit->time12;}else{echo '';} ?></td>
          <td colspan="2">{{$sub12s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub13s!=''){echo date('d/m/y',strtotime($admit->date13)).','.$admit->time13;}else{echo '';} ?></td>
          <td colspan="2">{{$sub13s}}  </td>
          <td colspan="2"><?php if($sub14s!=''){echo date('d/m/y',strtotime($admit->date14)).','.$admit->time14;}else{echo '';} ?></td>
          <td colspan="2">{{$sub14s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub15s!=''){echo date('d/m/y',strtotime($admit->date15)).','.$admit->time15;}else{echo '';} ?></td>
          <td colspan="2">{{$sub15s}}  </td>
          <td colspan="2"><?php if($sub16s!=''){echo date('d/m/y',strtotime($admit->date16)).','.$admit->time16;}else{echo '';} ?></td>
          <td colspan="2">{{$sub16s}} </td>
      </tr>

      <tr>
          <td colspan="2"><?php if($sub17s!=''){echo date('d/m/y',strtotime($admit->date17)).','.$admit->time17;}else{echo '';} ?></td>
          <td colspan="2">{{$sub17s}}  </td>
          <td colspan="2"><?php if($sub18s!=''){echo date('d/m/y',strtotime($admit->date18)).','.$admit->time18;}else{echo '';} ?></td>
          <td colspan="2">{{$sub18s}} </td>
      </tr>

      <tr>
         <th id ="footer" colspan="7">Head Teacher Signature</th>
         <th></th>
      </tr>

</table>
<br><br><br><br>

@endforeach


</body>
</html>


