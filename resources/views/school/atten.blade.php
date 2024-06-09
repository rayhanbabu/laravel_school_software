@extends('school/schoolheader')
@section('atten','active')
@section('content')
          <h4 class="mt-4">Attendance
          @if(Session::has('teacher'))
            Class : {{Session::get('teacher')->atten_class }},
            Group : {{Session::get('teacher')->atten_babu }},
            Section : {{Session::get('teacher')->atten_section }}
          @else
                
          @endif
        </h4>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active"></li>
                  </ol>
  
   
                 <div class="form-group  mx-3 my-3">
                       @if(Session::has('success'))
                   <div  class="alert alert-success"> {{Session::get('success')}}</div>
                       @endif
                           @if(Session::has('danger'))
                   <div  class="alert alert-danger"> {{Session::get('danger')}}</div>
                           @endif
                             </div>

   <form method="get"  id="email_form"    enctype="multipart/form-data" > 
   <div class="row mt-3 mb-0 mx-2">

           @if(Session::has('teacher'))
           <div class="col-sm-2"> 
                  <input type ="hidden" name="section" id="section" value="{{Session::get('teacher')->atten_section}}">
             </div>

             <div class="col-sm-2"> 
                  <input type ="hidden" name="group" id="group" value="{{Session::get('teacher')->atten_babu}}">
             </div>

             <div class="col-sm-1"> 
                  <input type ="hidden" name="class" id="class" value="{{Session::get('teacher')->atten_class }}">
             </div>

           @elseif(Session::has('school'))


                  <div class="col-sm-2"> 
                              <select class="form-control"  id="class"   name ="class"  required>
				                            <option  value="">Select Class </option>
                                      @foreach($classrow as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
                                      @endforeach 					
		                          </select>
                  </div>


                   
                  <div class="col-sm-2"> 
                           @if(Session::get('school')->atten_group_access=='Yes')
                               <select class="form-control" id="group"  name ="group"  >
                                       <option  value="">Select Group </option>
                                          @foreach($grouprow as $row)
                                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                                         @endforeach 	   					
			                          </select>
                               @else
                            <input type ="hidden" name="group" id="group" value="">
                         @endif
                  </div>


              <div class="col-sm-2"> 

                         @if(Session::get('school')->atten_section_access=='Yes')
                             <select class="form-control" id="section"  name ="section"  >
                                      <option  value="">Select Section </option>
                                      @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                     @endforeach					
			                       </select>
                             @else
                             <input type ="hidden" name="section" id="section" value="">
                        @endif         
              </div>


               


           @endif
          

         <div class="col-sm-2"> 
               <input type="date"  id="birth_date" name="date" autocomplete="off"  class="form-control "  required>
         </div>

         <div class="col-sm-2"> 
                        <select class="form-control"  id="action"   name ="action"  required>
                                  <option   value="add">Add</option>
			          <option   value="edit">Edit</option>					
		        </select>
         </div>




        


         <div class="col-sm-2"> 
                <button  type="submit" id="add_employee_btn" class="btn btn-primary my-1">Submit </button>
         </div>
   
     @if($action!='')
         <div class="col-sm-2"> <h5>Group: {{$group }}</h5> </div>
         <div class="col-sm-2"><h5>Class: {{$class }}</h5> </div>
         <div class="col-sm-2"><h5>Date: {{$date }} </h5></div>
         <div class="col-sm-2"><h5>Action: {{$action }} </h5></div>
       @endif   


         </div> 
         
         
            @if($fail!="")
                   <div  class="alert alert-danger"> {{$fail}}</div>
               @endif
  </form>

  <div class="container">
  <div class="table-responsive">
  <form method="post" action="{{url('atten/insert')}}"  class="myform"  enctype="multipart/form-data" >
    {!! csrf_field() !!}

    <input type ="hidden" name="date" id="date" value="{{$date}}">
    <input type ="hidden" name="action" id="action" value="{{$action}}">
        <table class="table table-bordered table-sm text-start align-middle">
        <thead>
                
             <tr>
                 <th>Stu. ID</th>
                 <th>Roll</th>
                 <th>Name</th>
                 <th>Group</th>
                 <th>Section</th>
                 <th>  <input type="button" onclick='selects()' value="Select All"/>    </th>
             </tr>
        </thead>
    
        <tbody>
        @foreach($data as $row)
           <tr>
            @if($action=='edit')
                   @php
                        $uid=$row->uid
                   @endphp
             @else
                     @php
                        $uid=$row->id
                     @endphp
          
             @endif

             <input type ="hidden" name="uid[]" id="uid" value="{{$uid}}">

 
                 <td>{{studentinfo($uid,'stu_id')}} </td>

                  <td>{{studentinfo($uid,'roll')}} </td>

                  <td>{{studentinfo($uid,'name')}} </td>
                  <input type ="hidden" name="phone[]" id="name" value="{{$row->phone}}">
                  <input type ="hidden" name="class[]" id="name" value="{{$row->class}}">
                  <input type ="hidden" name="babu[]" id="name" value="{{$row->babu}}">
                  <input type ="hidden" name="eiin[]" id="eiin" value="{{$row->eiin}}">
                
                  <td>{{$row->babu}}</td>
 
               <td>{{$row->section}}
                   <input type ="hidden" name="section[]" id="section" value="{{$row->section}}">
                 </td>
             
       @if($action=='edit')
              @if($row->status==1)
                        @php
                        $checked="checked";
                        @endphp
             @else
                        @php
                        $checked="";
                        @endphp
             @endif
             <input type ="hidden" name="id[]" id="id" value="{{$row->id}}">
             <td><input  type="checkbox"  class="form-check-input" {{$checked}}  id="chk[]" name="chbox[]"  value="{{$row->id}}"> </td>
      
            @endif


        @if($action=='add')
                     @php
                        $checked="";
                     @endphp
         <td><input type="checkbox" class="form-check-input" {{$checked}}  id="chk[]" name="chbox[]"  value="{{$row->id}}" >  </td>
        @endif        
              
        </tr>
      @endforeach 
        </tbody>		 


       </table>
       <input type="submit"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>

       </form>
  </div>
</div>


      <script>
         function selects(){  
            var ele=document.getElementsByClassName('form-check-input'); 
           // var n1 = $( "#chk" ).length;
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;   
                  }  

                  //console.log(ele.length);
            }  

      </script>

              
     



































  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
       

@endsection     