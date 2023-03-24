<?php 
use App\Models\Teacher;
use App\Models\Exam;

function teacher($id){
    if($id!=0){
       $teacher=Teacher::where('id',$id)->first();
       return $teacher->name;
    }else{
        return '';
    }
}
function subject($serial){
    if($serial!=0){
        $subject=Exam::where('babu','subject')->where('serial',$serial)->first();
        return $subject->text1;
    }else{
        return '';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
      
	   td,table
         {
		    border:1px solid black;
			border-collapse:collapse;
            *background-color:gray;
		 }
		td
		{
          padding:1px;
		  text-align:center;
		  font-family:Cambria,"Hoefler text","Liberation Serf",Times,"Times New Roman",serif;	
          font-size:14px;
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
           height:35px;
	   }	
	    #up{
		   font-size:17px;
		   text-align:center;
           height:35px;
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
      height:75px;
      text-align:right;
      font-size:15px;
    }

    #headerhight{
       height:5px;
    }


	  	   
	  </style>	   


</head>
<body>



  <table>

      <tr>
         <th id="school" colspan="9">{{Session::get('school')->school}}</th>
      </tr>

      <tr>
         <th id="up" colspan="9">{{Session::get('school')->address}}</th>
      </tr>

      <tr>
         <th id="up" colspan="9">Class Routine - {{Session::get('school')->year}}</th>
      </tr>


    
      <tr>
         <th id="headerhight" colspan="9"></th>
      </tr>
   
     

     <tr>
          <th></th>
          <th>Class</th>
          <th >:{{$class}}</th>
          <th>Group</th>
          <th >:{{$babu}}</th>
          <th>Section</th>
          <th >:{{$section}}</th>
          <th>Shift</th>
          <th >:{{Session::get('school')->shift}}</th>
         
     </tr>

     <tr>
          <th width="70" ></th>
          <th width="86" ></th>
          <th width="86" ></th>
          <th width="86" ></th>
          <th width="86" ></th>
          <th width="86" ></th>
          <th width="86" ></th>
          <th width="86" ></th>
          <th width="86" ></th> 
     </tr>

     <tr>
          <td>Day</td>
          <td>Period 1</td>
          <td>Period 2</td>
          <td>Period 3</td>
          <td>Period 4</td>
          <td>Period 5</td>
          <td>Period 6</td>
          <td>Period 7</td>
          <td>Period 8</td>
     </tr>

     @foreach($admit as $row)
     <tr>
          <td>{{$row->day}}</td>
          <td>{{$row->date1}} <br> <?php echo substr(subject($row->sub1),0,15) ?> <br> <?php echo substr(teacher($row->tea1),0,15) ?> </td>
          <td>{{$row->date2}} <br> <?php echo substr(subject($row->sub2),0,15) ?> <br> <?php echo substr(teacher($row->tea2),0,15) ?> </td>
          <td>{{$row->date3}} <br> <?php echo substr(subject($row->sub3),0,15) ?> <br> <?php echo substr(teacher($row->tea3),0,15) ?> </td>
          <td>{{$row->date4}} <br> <?php echo substr(subject($row->sub4),0,15) ?> <br> <?php echo substr(teacher($row->tea4),0,15) ?> </td>
          <td>{{$row->date5}} <br> <?php echo substr(subject($row->sub5),0,15) ?> <br> <?php echo substr(teacher($row->tea5),0,15) ?> </td>
          <td>{{$row->date6}} <br> <?php echo substr(subject($row->sub6),0,15) ?> <br> <?php echo substr(teacher($row->tea6),0,15) ?> </td>
          <td>{{$row->date7}} <br> <?php echo substr(subject($row->sub7),0,15) ?> <br> <?php echo substr(teacher($row->tea7),0,15) ?> </td>
          <td>{{$row->date8}} <br> <?php echo substr(subject($row->sub8),0,15) ?> <br> <?php echo substr(teacher($row->tea8),0,15) ?> </td>
    </tr>  
     @endforeach  
     
     </table>   


     

     

    

      


    

     

     





</body>
</html>


