<!DOCTYPE html>
<html>
<head>
<style>

	   td,table
             {
               border: 1px solid  black;
		     border-collapse:collapse;
               color:black;
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
		   font-size:23px;
		   text-align:center;
               padding:10px; 
               height:35px;
	   }	
	    #up{
		 font-size:21px;
		 text-align:center;
           height:30px;
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
       left:25px;
       top:250px;
       z-index: -1;
       opacity: .1;
     }	   
  </style>	   

</head>
<body>



<div class="rayhan">
<img src="{{ public_path("/uploads/admin/".Session::get('school')->image) }}" style=" width:700px; height:700px; "/>
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
         <th id="up" colspan="9">  </th>
         <th></th>
      </tr>
   
   

      <tr>
           <th></th>
           <th colspan="2"> Name</th>
           <th colspan="7">:</th>
           <th colspan="3" rowspan="4"> <img src="{{ public_path("/images/grade.jpg")}}" style=" width:100px; height:120px; " /> </th>

      </tr>

      <tr>
           <th></th>
           <th colspan="2">Student ID</th>
           <th colspan="3">: </th>
           <th colspan="2">Roll</th>
           <th colspan="2">: </th>
       
      </tr>

      <tr>
           <th></th>
           <th colspan="2">Group</th>
           <th colspan="3">: </th>
           <th colspan="2">Class</th>
           <th colspan="2">:</th>
      </tr>

       <tr>
           <th></th>
           <th colspan="2">Shift</th>
           <th colspan="3">: </th>
           <th colspan="2">Section</th>
           <th colspan="2">: </th>
      </tr>


     

      <tr>
           <th></th>
           <th colspan="2"> GPA</th>
           <th colspan="3">: </th>
           <th colspan="2">  Grade</th>
           <th colspan="2">: </th>
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
      

     

      <tr>
          <th width="10" ></th> 
          <th width="5" ></th>
          <th width="70" ></th>
          <th width="50" ></th>
          <th width="35" ></th>
          <th width="15" ></th>
          <th width="35" ></th>
          <th width="30" ></th>
          <th width="30" ></th>
          <th width="35" ></th>
          <th width="35" ></th>
          <th width="30" ></th>
          <th width="35" ></th> 
     </tr>

      <tr>
           <td colspan="2">Serial </td>
           <td id="leftside" colspan="4">Name Of Subject</td>
           <td >CQ</td>
           <td >MCQ</td>
           <td >Practical</td>
           <td >Total</td>
           <td >Highest</td>
           <td >GPA</td>
           <td >Grade</td>
      </tr>

     

      <tr>
           <td colspan="2">i</td>
           <td id="leftside" colspan="4"></td>
           <td></td>
           <td> </td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
      </tr>

     <tr>
          <td colspan="2">ii</td>
          <td id="leftside" colspan="4"></td>
          <td> </td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr> 
     
     <tr>
           <td colspan="2">iii</td>
           <td id="leftside" colspan="4"></td>
           <td> </td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td></td>
      </tr>
     
     <tr>
          <td colspan="2">iv</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>    
     
     <tr>
          <td colspan="2">v</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>   
     
     <tr>
          <td colspan="2">vi</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>    
     
     <tr>
          <td colspan="2">vii</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>  
     
     <tr>
          <td colspan="2">viii</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>   
     
     <tr>
          <td colspan="2">ix</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>  

     <tr>
          <td colspan="2">x</td>
          <td id="leftside" colspan="4"> </td>
          <td></td>
          <td> </td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>    

     
     <tr>
          <td colspan="2">xi</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr> 

     <tr>
          <td colspan="2">xii</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr> 
     
     <tr>
          <td colspan="2">xiii</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>    
     
     <tr>
          <td colspan="2">xiv</td>
          <td id="leftside" colspan="4"></td>
          <td></td>
          <td> </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
     </tr>

     <tr>
          <td colspan="2"></td>
          <td id="leftside" colspan="4">Total Marks</td>
          <td></td>
          <td> </td>
          <td> </td>
          <td></td>
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

</table>
  



</body>
</html>


