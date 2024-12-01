<!DOCTYPE html>
<html>
<head>
<style>
	   td,table
         {
		    border:1px solid  {{$color->color10}};
			border-collapse:collapse;
            color:{{$color->color9}};
		 }
         
		td
		{
          padding:1px;
		  text-align:center;
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
           height:40px;
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
       height:24px;
    }


	  	   
	  </style>	   


</head>
<body>

<table>

<tr>
   <th id="school" colspan="30">{{Session::get('school')->school}}</th>
</tr>

<tr>
   <th id="up" colspan="30">{{Session::get('school')->address}}</th>
</tr>

<tr>
   <th id="up" colspan="30">Tabulation Sheets - {{$year}}</th>
</tr>




<tr>
    <th id="rightside" ></th>
    <th colspan="2">Exam</th>
    <th colspan="5">:  {{examName($exam)}}</th>
    <th colspan="2">Group</th>
    <th colspan="4">: {{$babu}}</th>
    <th colspan="2">Class</th>
    <th colspan="3">: {{$class}}</th>
    <th colspan="3">Section</th>
    <th colspan="2">: {{$section}}</th>
    <th colspan="2">Shift</th> 
    <th colspan="4">: {{shift($section,Session::get('school')->eiin)}} </th>
</tr>


<tr>
   <th id="headerhight" colspan="30"></th>
</tr>


<tr>
    <th width="35" ></th>
    <th width="25" ></th>
    <th width="25" ></th>
    <th width="25" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>

    <th width="35" ></th>
    <th width="25" ></th>
    <th width="25" ></th>
    <th width="25" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>

    <th width="50" ></th>
    <th width="25" ></th>
    <th width="25" ></th>
    <th width="25" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="20" ></th>
    <th width="35" ></th>
    
</tr>

@foreach($student as $row)

<tr>
    <th colspan="2">Stu_id</th>
    <th colspan="3">:{{$row->stu_id}}</th>
    <th colspan="2">Name</th>
    <th colspan="8">: <?php echo substr($row->name,0,18); ?></th>
    <th colspan="2">Roll</th>
    <th colspan="3">: {{$row->roll}}</th>
    <th colspan="2">Result</th>
    <th colspan="3">:{{$row->result}}</th>
    <th colspan="3"></th> 
    <th colspan="2"> </th>
</tr>



 <tr>
     <td colspan="4">Subjects</td>
     <td>A</td>
     <td>AL</td>
     <td>70%</td>
     <td>tot</td>
     <td>gpa</td>
     <td>gra</td>

    <td colspan="4">Subjects</td>
    <td>A</td>
     <td>AL</td>
     <td>70%</td>
    <td>tot</td>
    <td>gpa</td>
    <td>gra</td>

    <td colspan="4">Subjects</td>
    <td>A</td>
     <td>AL</td>
     <td>70%</td>
    <td>tot</td>
    <td>gpa</td>
    <td>gra</td>
 </tr>  


  <tr>
     @if($class=='Ten')
         
               <td  colspan="4"> <?php echo substr($row->sub11n,0,22);?></td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub11c}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub11m}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub11c * 0.70)}} @else @endif  </td>
               <td> </td>
               <td> </td>
               <td> </td>
      @else
      @if(!empty(subjectshow('sub11',$row->class,$row->babu,$row->eiin)) && $row->sub11h)                  
               <td  colspan="4"> <?php echo substr($row->sub11n,0,22);?></td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub11c}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub11m}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub11c * 0.70)}} @else @endif  </td>
               <td> {{$row->sub11t}} </td>
               <td> {{$row->sub11gp}}</td>
               <td> {{$row->sub11g}} </td>
        @else
               <td colspan="4" ></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
       @endif
     @endif
   
    

     @if($class=='Ten') 
               <td  colspan="4"> <?php echo substr($row->sub13n,0,22);?> </td>
               <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub13c}} @else @endif  </td>
               <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub13m}} @else @endif  </td>
               <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['pstatus']=='number') {{$row->sub13p}} @else @endif  </td>
               <td> </td>
               <td> </td>
               <td> </td>
      @else
       @if(!empty(subjectshow('sub13',$row->class,$row->babu,$row->eiin)) && $row->sub13h)           
              <td  colspan="4"> <?php echo substr($row->sub13n,0,22); ?> </td>
              <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub13c}} @else @endif  </td>
              <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub13m}} @else @endif  </td>
              <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub13c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub13t}}</td>
              <td> {{$row->sub13gp}}</td>
              <td> {{$row->sub13g}}</td>
       @else
             <td colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
      @endif
    @endif   


       @if(!empty(subjectshow('sub15',$row->class,$row->babu,$row->eiin)) && $row->sub15h) 
              <td  colspan="4"> <?php echo substr($row->sub15n,0,22); ?> </td>
              <td> @if(subjectshow('sub15',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub15c}} @else @endif </td>
              <td> @if(subjectshow('sub15',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub15m}} @else @endif </td>
              <td> @if(subjectshow('sub15',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub15p}} @else @endif </td>
              <td> {{$row->sub15t}}</td>
              <td> {{$row->sub15gp}}</td>
              <td> {{$row->sub15g}}</td>
       @else
                <td colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
       @endif

   </tr>    

   <tr>
        @if(!empty(subjectshow('sub12',$row->class,$row->babu,$row->eiin)) && $row->sub12h)        
            <td  colspan="4"> <?php echo substr($row->sub12n,0,22); ?> </td>
            <td> @if(subjectshow('sub12',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub12c}} @else @endif </td>
            <td> @if(subjectshow('sub12',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub12m}} @else @endif </td>
            <td> @if(subjectshow('sub12',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub12c * 0.70)}}@else @endif </td>
            <td> {{$row->sub12t}} </td>
            <td> {{$row->sub12gp}} </td>
            <td> {{$row->sub12g}} </td>
        @else
                 <td colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
        @endif

         @if(!empty(subjectshow('sub14',$row->class,$row->babu,$row->eiin)) && $row->sub14h)
              <td  colspan="4"> <?php echo substr($row->sub14n,0,22); ?> </td>
              <td> @if(subjectshow('sub14',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub14c}} @else @endif  </td>
              <td> @if(subjectshow('sub14',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub14m}} @else @endif  </td>
              <td> @if(subjectshow('sub14',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub14c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub14t}}</td>
              <td> {{$row->sub14gp}}</td>
              <td> {{$row->sub14g}}</td>
         @else
             <td colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
         @endif

         @if(!empty(subjectshow('sub16',$row->class,$row->babu,$row->eiin)) && $row->sub16h)
              <td  colspan="4"> <?php echo substr($row->sub16n,0,22); ?> </td>
              <td> @if(subjectshow('sub16',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub16c}} @else @endif  </td>
              <td> @if(subjectshow('sub16',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub16m}} @else @endif  </td>
              <td> @if(subjectshow('sub16',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub16c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub16t}}</td>
              <td> {{$row->sub16gp}}</td>
              <td> {{$row->sub16g}}</td>    
         @else
                 <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td> 
         @endif
  </tr>    

   <tr>
       @if(!empty(subjectshow('sub17',$row->class,$row->babu,$row->eiin)) && $row->sub17h)   
              <td  colspan="4"><?php echo substr($row->sub17n,0,22); ?> </td>
              <td> @if(subjectshow('sub17',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub17c}} @else @endif  </td>
              <td> @if(subjectshow('sub17',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub17m}} @else @endif  </td>
              <td> @if(subjectshow('sub17',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub17c * 0.70)}}@else @endif  </td>
              <td> {{$row->sub17t}}</td>
              <td> {{$row->sub17gp}}</td>
              <td> {{$row->sub17g}}</td>
        @else
                 <td  colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
        @endif

        @if(!empty(subjectshow('sub18',$row->class,$row->babu,$row->eiin)) && $row->sub18h)
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub18n,0,22); ?> </td>
              <td> @if(subjectshow('sub18',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub18c}} @else @endif  </td>
              <td> @if(subjectshow('sub18',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub18m}} @else @endif  </td>
              <td> @if(subjectshow('sub18',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub18c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub18t}}</td>
              <td> {{$row->sub18gp}}</td>
              <td> {{$row->sub18g}}</td>
        @else
                 <td  colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td> 
        @endif

         @if(!empty(subjectshow('sub19',$row->class,$row->babu,$row->eiin)) && $row->sub19h)
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub19n,0,22); ?> </td>
              <td> @if(subjectshow('sub19',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub19c}} @else @endif  </td>
              <td> @if(subjectshow('sub19',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub19m}} @else @endif  </td>
              <td> @if(subjectshow('sub19',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub19c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub19t}}</td> 
              <td> {{$row->sub19gp}}</td>
              <td> {{$row->sub19g}}</td>
         @else
                 <td  colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
         @endif
 </tr>    


  <tr>
       @if(!empty(subjectshow('sub20',$row->class,$row->babu,$row->eiin)) && $row->sub20h)
              <td colspan="4"> <?php echo substr($row->sub20n,0,22); ?></td>
              <td> @if(subjectshow('sub20',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub20c}} @else @endif  </td>
              <td> @if(subjectshow('sub20',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub20m}} @else @endif  </td>
              <td> @if(subjectshow('sub20',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{ceil($row->sub20c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub20t}}</td>
              <td> {{$row->sub20gp}}</td>
              <td> {{$row->sub20g}}</td>
        @else
                 <td colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
        @endif

        @if(!empty(subjectshow('sub21',$row->class,$row->babu,$row->eiin)) && $row->sub21h)
              <td  colspan="4"> <?php echo substr($row->sub21n,0,22); ?></td>
              <td> @if(subjectshow('sub21',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub21c}} @else @endif  </td>
              <td> @if(subjectshow('sub21',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub21m}} @else @endif  </td>
              <td> @if(subjectshow('sub21',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{ceil($row->sub21c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub21t}} </td>
              <td> {{$row->sub21gp}} </td>
              <td> {{$row->sub21g}} </td>
       @else
               <td  colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
       @endif

       @if(!empty(subjectshow('sub22',$row->class,$row->babu,$row->eiin)) && $row->sub22h)
              <td  colspan="4"> <?php echo substr($row->sub22n,0,22); ?></td>
              <td> @if(subjectshow('sub22',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub22c}} @else @endif  </td>
              <td> @if(subjectshow('sub22',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub22m}} @else @endif  </td>
              <td> @if(subjectshow('sub22',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub22p}} @else @endif  </td>
              <td> {{$row->sub22t}}</td>
              <td> {{$row->sub22gp}}</td>
              <td> {{$row->sub22g}}</td>
        @else
                <td  colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
        @endif
   </tr>  

  <tr>
       @if(!empty(subjectshow('sub23',$row->class,$row->babu,$row->eiin)) && $row->sub23h) 
              <td colspan="4"> <?php echo substr($row->sub23n,0,22); ?></td>
              <td> @if(subjectshow('sub23',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub23c}} @else @endif  </td>
              <td> @if(subjectshow('sub23',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub23m}} @else @endif  </td>
              <td> @if(subjectshow('sub23',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub23p}} @else @endif  </td>
              <td> {{$row->sub23t}}  </td>
              <td> {{$row->sub23gp}} </td>
              <td> {{$row->sub23g}}  </td>
       @else
                <td  colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
       @endif

     @if(!empty(subjectshow('sub24',$row->class,$row->babu,$row->eiin)) && $row->sub24h)
              <td  colspan="4"> <?php echo substr($row->sub24n,0,22); ?></td>
              <td> @if(subjectshow('sub24',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub24c}} @else @endif  </td>
              <td> @if(subjectshow('sub24',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub24m}} @else @endif  </td>
              <td > @if(subjectshow('sub24',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub24p}} @else @endif  </td>
              <td> {{$row->sub24t}}  </td>
              <td> {{$row->sub24gp}} </td>
              <td colspan="2"> {{$row->sub24g}}  </td>
      @else
               <td colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td>
      @endif

      <td colspan="3"></td>
      <td> </td>
      <td> </td>
      <td></td>
      <td> </td>
      <td></td>
      <td> </td>
 </tr>      


  <tr>
       <td colspan="12"> {{examName($exam)}} Gpa : {{$row->gpa}} , Grade : {{$row->g}}, Total Marks : {{$row->total}}</td>
  
     @if($row->rs==2)
       <td colspan="9">Half Yearly Gpa : {{$row->fgp}} , Grade : {{$row->fg}} </td>
       <td colspan="9"> CGpa : {{$row->cgp}} , CGrade : {{$row->cg}} </td>
    @else
      <td colspan="9"></td>
      <td colspan="9"></td>
    @endif  
 </tr> 

@endforeach  
</table>   

     

    

      


    

     

     





</body>
</html>


