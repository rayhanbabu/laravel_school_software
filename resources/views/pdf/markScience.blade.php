<!DOCTYPE html>
<html>
<head>
<style>

	   td,table
             {
              border: 1px solid {{$color->color8}};
		    border-collapse:collapse;
              color:{{$color->color7}};
		   }

             table{
		      border: 4px dotted   {{$color->color8}}; 
		   }


		td
		{
           padding:1px;
	     text-align:center;
	     font-family:Cambria,"Hoefler text","Liberation Serf",Times,"Times New Roman",serif;	
           font-size:18px;
           height:16px;						   
		} 
		 
		 th{
			 padding:2px;
			 text-align:left;
			 font-size:18px;
			 font-family:Cambria,"Hoefler text","Liberation Serf",Times,"Times New Roman",serif;
                height:30px;		
		  }
			
			th span{
		   margin-left:8px;
			}
	    #school{
		   font-size:{{$school->mnsize}}px;
		   text-align:center;
               padding:10px; 
               height:35px;
	   }	
	    #up{
		 font-size:{{$school->sasize}}px;
		 text-align:center;
           height:30px;
	   }		
    #exam{
	   font-size:{{$school->shsize}}px;
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

      #leftside{
         text-align:left;
       }

       .page-break{
          page-break-after:always;
       }

       #sig{
          font-size:17px;
       }

       .rayhan {
       position: absolute;
       left:50px;
       top:250px;
       z-index: -1;
       opacity: .1;
     }	 
     
     .square-square{
  height: 15px;
  width: 15px;
  background-color:{{$color->color8}};
  margin-left:12px;
}

.circle-circle {
  height: 15px;
  width: 15px;
  background-color: {{$color->color8}};
  border-radius: 50%;
  margin-left:12px;
}

.triangle-up {
	width: 0;
	height: 0;
	border-left: 10px solid transparent;
	border-right: 10px solid transparent;
	border-bottom: 20px solid {{$color->color8}};
     margin-left:12px;
}

  </style>	   

</head>
<body>



@foreach($student as $row)
<div class="rayhan">
<img src="{{ public_path("/uploads/admin/".Session::get('school')->image) }}" style=" width:600px; height:600px; "/>
</div>
<table>

      <tr>
          <th></th>
      <th colspan="2" rowspan="3" > <img src="{{ public_path("/uploads/admin/".Session::get('school')->image) }}" style=" width:100px; height:100px; "/>  </th> 
         <th id="school" colspan="9">{{Session::get('school')->school}}</th>
         <th></th>
      </tr>

      <tr>
         <th></th>
         <th id="up" colspan="9">{{Session::get('school')->address}}</th>
         <th></th>
      </tr>

      <tr>
         <th></th>
         <th id="up" colspan="9">  {{examNameDes($exam)}}-{{$year}}</th>
         <th></th>
      </tr>
   
   

      <tr>
           <th></th>
           <th colspan="2"> Name</th>
           <th colspan="7">: <?php echo substr($row->name,0,24); ?></th>
           <th colspan="3" rowspan="4"> <img src="{{ public_path("/images/grade.jpg")}}" style=" width:100px; height:120px; " /> </th>

      </tr>

      <tr>
           <th></th>
           <th colspan="2">Student ID</th>
           <th colspan="3">: {{$row->stu_id}}</th>
           <th colspan="2">Roll</th>
           <th colspan="2">: {{$row->roll}}</th>
       
      </tr>

      <tr>
           <th></th>
           <th colspan="2">Group</th>
           <th colspan="3">: {{$row->babu}}</th>
           <th colspan="2">Class</th>
           <th colspan="2">: {{$row->class}}</th>
      </tr>


       <tr>
           <th></th>
           <th colspan="2">Shift</th>
           <th colspan="3">: {{shift($row->section,Session::get('school')->eiin)}}</th>
           <th colspan="2">Section</th>
           <th colspan="2">: {{$row->section}}</th>
      </tr>


      <tr>
           <th></th>
           <th colspan="3"><?php echo substr(examName($exam),0,8); ?> GPA</th>
           <th colspan="2">: {{$row->gpa}}</th>
           <th colspan="3"><?php echo substr(examName($exam),0,8); ?> Grade</th>
           <th >: {{$row->g}}</th>
           <th></th>
           <th></th>
           <th></th>
      </tr>

      <tr>
           <th></th>
           <th colspan="3"> </th>
           <th colspan="2"> </th>
           <th colspan="3"> </th>
           <th> </th>
           <th colspan="2" > </th>
           <th ></th>
      </tr>

      @if($row->rs==2)
      <tr>
           <th></th>
           <th colspan="3">Previous GPA</th>
           <th colspan="2">: {{$row->fgp}}</th>
           <th colspan="3">Previous Grade</th>
           <th >: {{$row->fg}}</th>
           <th ></th>
           <th colspan="2"></th>
      </tr>

      <tr>
           <th></th>
           <th colspan="3">CGPA</th>
           <th colspan="2">: {{$row->cgp}}</th>
           <th colspan="3">CGrade</th>
           <th >: {{$row->cg}}</th>
           <th></th>
           <th colspan="2"></th>
      </tr>
      @else
      <tr>
           <th></th>
           <th colspan="3"></th>
           <th colspan="2"></th>
           <th colspan="3"></th>
           <th ></th>
           <th ></th>
           <th colspan="2"></th>
      </tr>

      <tr>
           <th></th>
           <th colspan="3"></th>
           <th colspan="2"></th>
           <th colspan="3"></th>
           <th ></th>
           <th ></th>
           <th colspan="2"></th>
      </tr>
      @endif  

     

      <tr>
          <th width="10"></th> 
          <th width="5"></th>
          <th width="70"></th>
          <th width="50"></th>
          <th width="35"></th>
          <th width="15"></th>
          <th width="35"></th>
          <th width="30"></th>
          <th width="30"></th>
          <th width="35"></th>
          <th width="35"></th>
          <th width="30"></th>
          <th width="35"></th> 
     </tr>

      <tr>
           <td colspan="2">Serial </td>
           <td id="leftside" colspan="4">Name Of Subject</td>
           <td >As.</td>
           <td >A.L.</td>
           <td >As. 70%</td>
           <td >Total</td>
           <td >Highest</td>
           <td >GPA</td>
           <td >Grade</td>
      </tr>

      @if($class=='Ten')
            <tr>          
               <td  colspan="2">i</td>  
               <td  id="leftside" colspan="4"> <?php echo substr($row->sub11n,0,30);?> </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub11c}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub11m}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub11c * 0.70)}} @else @endif  </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
          </tr>
      @else
         @if(!empty(subjectshow('sub11',$row->class,$row->babu,$row->eiin)) && $row->sub11h)
           <tr>          
               <td  colspan="2">i</td>  
               <td  id="leftside" colspan="4"> <?php echo substr($row->sub11n,0,30);?> </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub11c}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub11m}} @else @endif  </td>
               <td> @if(subjectshow('sub11',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub11c * 0.70)}} @else @endif  </td>
               <td> {{$row->sub11t}} </td>
               <td> {{$row->sub11h}} </td>
               <td> {{$row->sub11gp}}</td>
               <td> {{$row->sub11g}} </td>
          </tr>
        @else
           <tr>
               <td colspan="2" >i</td> <td id="leftside" colspan="4" ></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
          </tr>
       @endif
      @endif



      @if(!empty(subjectshow('sub12',$row->class,$row->babu,$row->eiin)) && $row->sub12h)
           <tr>          
              <td  colspan="2"> ii </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub12n,0,30); ?> </td>
              <td> @if(subjectshow('sub12',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub12c}} @else @endif  </td>
              <td> @if(subjectshow('sub12',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub12m}} @else @endif  </td>
              <td> @if(subjectshow('sub12',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub12c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub12t}} </td>
              <td> {{$row->sub12h}} </td>
              <td> {{$row->sub12gp}} </td>
              <td> {{$row->sub12g}} </td>
          </tr>
      @else
           <tr>
                <td colspan="2">ii</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif



      @if($class=='Ten')
            <tr>           
               <td  colspan="2">iii</td>  
               <td  id="leftside" colspan="4"> <?php echo substr($row->sub13n,0,30);?> </td>
               <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub13c}} @else @endif  </td>
               <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub13m}} @else @endif  </td>
               <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub13c * 0.70)}} @else @endif  </td>
               <td> </td>
               <td> </td>
               <td> </td>
               <td> </td>
          </tr>
      @else


      @if(!empty(subjectshow('sub13',$row->class,$row->babu,$row->eiin)) && $row->sub13h)
           <tr>          
              <td  colspan="2">iii</td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub13n,0,30); ?> </td>
              <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub13c}} @else @endif  </td>
              <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub13m}} @else @endif  </td>
              <td> @if(subjectshow('sub13',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub13c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub13t}}</td>
              <td> {{$row->sub13h}}</td>
              <td> {{$row->sub13gp}}</td>
              <td> {{$row->sub13g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">iii</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif
    @endif






      @if(!empty(subjectshow('sub14',$row->class,$row->babu,$row->eiin)) && $row->sub14h)
           <tr>          
              <td  colspan="2"> iv </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub14n,0,30); ?> </td>
              <td> @if(subjectshow('sub14',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub14c}} @else @endif  </td>
              <td> @if(subjectshow('sub14',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub14m}} @else @endif  </td>
              <td> @if(subjectshow('sub14',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub14c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub14t}}</td>
              <td> {{$row->sub14h}}</td>
              <td> {{$row->sub14gp}}</td>
              <td> {{$row->sub14g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">iv</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub15',$row->class,$row->babu,$row->eiin)) && $row->sub15h)
           <tr>          
              <td  colspan="2"> v </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub15n,0,30); ?> </td>
              <td> @if(subjectshow('sub15',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub15c}} @else @endif  </td>
              <td> @if(subjectshow('sub15',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub15m}} @else @endif  </td>
              <td> @if(subjectshow('sub15',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub15c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub15t}}</td>
              <td> {{$row->sub15h}}</td>
              <td> {{$row->sub15gp}}</td>
              <td> {{$row->sub15g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">v</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub16',$row->class,$row->babu,$row->eiin)) && $row->sub16h)
           <tr>          
              <td  colspan="2"> vi </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub16n,0,30); ?> </td>
              <td> @if(subjectshow('sub16',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub16c}} @else @endif  </td>
              <td> @if(subjectshow('sub16',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub16m}} @else @endif  </td>
              <td> @if(subjectshow('sub16',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub16c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub16t}}</td>
              <td> {{$row->sub16h}}</td>
              <td> {{$row->sub16gp}}</td>
              <td> {{$row->sub16g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">vi</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub17',$row->class,$row->babu,$row->eiin)) && $row->sub17h)
           <tr>          
              <td  colspan="2"> vii </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub17n,0,30); ?> </td>
              <td> @if(subjectshow('sub17',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub17c}} @else @endif  </td>
              <td> @if(subjectshow('sub17',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub17m}} @else @endif  </td>
              <td> @if(subjectshow('sub17',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub17c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub17t}}</td>
              <td> {{$row->sub17h}}</td>
              <td> {{$row->sub17gp}}</td>
              <td> {{$row->sub17g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">vii</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub18',$row->class,$row->babu,$row->eiin)) && $row->sub18h)
           <tr>          
              <td  colspan="2"> viii </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub18n,0,30); ?> </td>
              <td> @if(subjectshow('sub18',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub18c}} @else @endif  </td>
              <td> @if(subjectshow('sub18',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub18m}} @else @endif  </td>
              <td> @if(subjectshow('sub18',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub18c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub18t}}</td>
              <td> {{$row->sub18h}}</td>
              <td> {{$row->sub18gp}}</td>
              <td> {{$row->sub18g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">viii</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub19',$row->class,$row->babu,$row->eiin)) && $row->sub19h)
           <tr>          
              <td  colspan="2">ix </td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub19n,0,30); ?> </td>
              <td> @if(subjectshow('sub19',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{$row->sub19c}} @else @endif  </td>
              <td> @if(subjectshow('sub19',$row->class,$row->babu,$row->eiin)['mstatus']=='number') {{$row->sub19m}} @else @endif  </td>
              <td> @if(subjectshow('sub19',$row->class,$row->babu,$row->eiin)['cstatus']=='number') {{ceil($row->sub19c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub19t}}</td>
              <td> {{$row->sub19h}}</td>
              <td> {{$row->sub19gp}}</td>
              <td> {{$row->sub19g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">ix</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif



      @if(!empty(subjectshow('sub20',$row->class,$row->babu,$row->eiin)) && $row->sub20h)
           <tr>          
              <td  colspan="2">x</td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub20n,0,30); ?></td>
              <td> @if(subjectshow('sub20',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub20c}} @else @endif  </td>
              <td> @if(subjectshow('sub20',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub20m}} @else @endif  </td>
              <td> @if(subjectshow('sub20',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{ceil($row->sub20c * 0.70)}} @else @endif  </td>
              <td> {{$row->sub20t}}</td>
              <td> {{$row->sub20h}}</td>
              <td> {{$row->sub20gp}}</td>
              <td> {{$row->sub20g}}</td>
          </tr>
      @else
           <tr>
                <td colspan="2">x</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub21',$row->class,$row->babu,$row->eiin)) && $row->sub21h)
           <tr>          
              <td  colspan="2">xi</td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub21n,0,30); ?></td>
              <td> @if(subjectshow('sub21',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub21c}} @else @endif  </td>
              <td> @if(subjectshow('sub21',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub21m}} @else @endif  </td>
              <td> @if(subjectshow('sub21',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub21p}} @else @endif  </td>
              <td> {{$row->sub21t}} </td>
              <td> {{$row->sub21h}} </td>
              <td> {{$row->sub21gp}} </td>
              <td> {{$row->sub21g}} </td>
          </tr>
      @else
           <tr>
                <td colspan="2">xi</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub22',$row->class,$row->babu,$row->eiin)) && $row->sub22h)
           <tr>          
              <td  colspan="2">xii</td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub22n,0,30); ?></td>
              <td> @if(subjectshow('sub22',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub22c}} @else @endif  </td>
              <td> @if(subjectshow('sub22',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub22m}} @else @endif  </td>
              <td> @if(subjectshow('sub22',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub22p}} @else @endif  </td>
              <td> {{$row->sub22t}}  </td>
              <td> {{$row->sub22h}}  </td>
              <td> {{$row->sub22gp}} </td>
              <td> {{$row->sub22g}}  </td>
          </tr>
      @else
           <tr>
                <td colspan="2">xii</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub23',$row->class,$row->babu,$row->eiin)) && $row->sub23h)
           <tr>          
              <td  colspan="2">xiii</td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub23n,0,30); ?></td>
              <td> @if(subjectshow('sub23',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub23c}} @else @endif  </td>
              <td> @if(subjectshow('sub23',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub23m}} @else @endif  </td>
              <td> @if(subjectshow('sub23',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub23p}} @else @endif  </td>
              <td> {{$row->sub23t}}  </td>
              <td> {{$row->sub23h}}  </td>
              <td> {{$row->sub23gp}} </td>
              <td> {{$row->sub23g}}  </td>
          </tr>
      @else
           <tr>
                <td colspan="2">xiii</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif


      @if(!empty(subjectshow('sub24',$row->class,$row->babu,$row->eiin)) && $row->sub24h)
           <tr>          
              <td  colspan="2">ivx</td>  
              <td  id="leftside" colspan="4"> <?php echo substr($row->sub24n,0,30); ?></td>
              <td> @if(subjectshow('sub24',$row->class,$row->babu,$row->eiin)['cstatus']=='number'){{$row->sub24c}} @else @endif  </td>
              <td> @if(subjectshow('sub24',$row->class,$row->babu,$row->eiin)['mstatus']=='number'){{$row->sub24m}} @else @endif  </td>
              <td> @if(subjectshow('sub24',$row->class,$row->babu,$row->eiin)['pstatus']=='number'){{$row->sub24p}} @else @endif  </td>
              <td> {{$row->sub24t}}  </td>
              <td> {{$row->sub24h}}  </td>
              <td> {{$row->sub24gp}} </td>
              <td> {{$row->sub24g}}  </td>
          </tr>
      @else
           <tr>
                <td colspan="2">ivx</td> <td id="leftside" colspan="4"></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td> 
           </tr>
      @endif




    

     
    

     <tr>
          <td colspan="2"></td>
          <td id="leftside" colspan="4">Total Marks</td>
          <td></td>
          <td> </td>
          <td> </td>
          <td>{{$row->total}}</td>
          <td></td>
          <td></td>
          <td></td>
     </tr>

    

     <tr>
          <th colspan="13" ></th> 
     </tr>

     <tr>
         <th colspan="13" ></th> 
     </tr>


         
     <tr>
        <th colspan="13" ></th> 
     </tr>

  <tr>
         <th></th>
         <th id="sig" colspan="3" >Class Teacher Signature</th>
          <th id="sig" colspan="5" >Head Teacher Signature</th>
          <th  id="sig" colspan="4" >Guardian Signature</th>
     </tr>

     <tr>
        <th colspan="13" ></th> 
     </tr>

</table>
  <div class="page-break"></div>
@endforeach  










</body>
</html>


