@extends('school/schoolheader')
@section('teacher_manage','active')
@section('content')

         <div class="row mt-4 mb-0">
               <div class="col-6"> <h4 class="mt-0">  Teacher Information   </h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                            
                         </div>
                     </div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex ">
                         <a class="btn btn-primary" href="{{url('teacher')}}" role="button">Back</a>
                             
                         </div>
                     </div> 
                    
             </div>  
                       <ol class="breadcrumb ">
                            <li class="breadcrumb-item active">/Teacher Info</li>
                        </ol>

         <form action="{{route('teacher.insert')}}" method="post" enctype="multipart/form-data">

                   <div class="row">
                     <div class="col-lg-12 mt-2">
                         <div class="card bg-light" >
                            <div class="card-body">
      
                   @csrf                
                <div class="row">
                     <div class="col-lg-6 mt-2"> 
                        <div class="form-group   my-2">
                          <input type="hidden" name="teacher_userid"  value="{{$teacher_userid}}" class="form-control" >
                            <label class=""><b>Teacher Name<span style="color:red;"> * </span></b></label>
                                 <input type="text" name="name"  value="{{$name}}" class="form-control"  required>
                                        @error('name')
                                             <div class="text-danger" role="alert">
                                                 {{$message}}
										                </div>
                                        @enderror
                       </div>
                 </div>  

             <div class="col-lg-6 mt-2"> 
                <div class="form-group  my-2">
                   <label class=""><b>Email<span style="color:red;">*</span></b></label>
                    <input type="email" name="email"  value="{{$email}}"  class="form-control" required>
                                    @error('email')
                                      <div class="text-danger" role="alert">
                                           {{$message}}
										       </div>
                                   @enderror
                </div> 
             </div>

             
      <div class="col-lg-6 mt-2"> 
          <div class="form-group  my-2">
               <label class=""><b>Phone Number(88)<span style="color:red;"> * </span></b></label>
               <input type="text" name="phone" pattern="[0][1][3 4 7 6 5 8 9][0-9]{8}" title="
				Please select Valid mobile number"  value="{{$phone}}"  class="form-control" required >
                                    @error('phone')
                                            <div class="text-danger" role="alert">
                                                 {{$message}}
										    </div>
                                        @enderror
          </div> 
      </div>  

             <div class="col-lg-6 mt-2"> 
                <div class="form-group  my-2">
                   <label class=""><b>Designation</b></label>
                   <input type="text" name="desig"  value="{{$desig}}" class="form-control" >
                  </div> 
               </div>




               <div class="col-lg-4 mt-2"> 
                <div class="form-group  my-2">
                   <label class=""><b>Password <span style="color:red;"> At least 6 digit</span></b></label>
                   <input type="text"  name="teacher_password"  minlength="6" maxlength="10"  value="{{$teacher_password}}" class="form-control"  required>
                             @error('teacher_password')
                                            <div class="text-danger" role="alert">
                                                 {{$message}}
										    </div>
                             @enderror
                  </div> 
               </div>

               
               <div class="col-lg-4 mt-2"> 
                <div class="form-group  my-2">
                <label class=""><b>Attendance Access <span style="color:red;"> </span></b></label>

                  <div class="row">

                    <div class="col-4">
                         <select class="form-select" name="atten_class" id="atten_class"  aria-label="Default select example" >
                                 <option value="">Select</option>
                                 @foreach($class as $row)
                                    @if($atten_class==$row->text1)
                                      <option value="{{$row->text1}}" selected>{{$row->text2}}</option>
                                    @else
                                       <option value="{{$row->text1}}">{{$row->text2}}</option>
                                    @endif
                                 @endforeach
                          </select>
                     </div>

                     <div class="col-5">
                         <select class="form-select" name="atten_babu" id="atten_babu"  aria-label="Default select example" >
                                 <option value="">Select</option>
                                 @foreach($group as $row)
                                 @if($atten_babu==$row->text1)
                                   <option value="{{$row->text1}}" selected>{{$row->text2}}</option>
                                 @else
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                   @endif
                                 @endforeach
                          </select>
                     </div>

                     <div class="col-3">
                         <select class="form-select" name="atten_section" id="atten_section"  aria-label="Default select example" >
                                 <option value="">Select</option>
                                     @foreach(Session::get('sectionarr') as $list)                                                  
                                          @if($atten_section==$list->text1)
                                                  <option  value="{{$list->text1}}" selected> 
                                                    {{$list->text1}} </option>
                                          @else
                                                 <option  value="{{$list->text1}}" > 
                                                    {{$list->text1}} </option>
                                          @endif

                                     @endforeach
                          </select>
                     </div>

                                                   
                     

                   </div>
               </div> 
            </div>


             <div class="col-lg-4 mt-2"> 
                <div class="form-group  my-2">
                     <label class=""><b>Finance Access <span style="color:red;"> </span></b></label>
                         <select class="form-select" name="teacher_fin_access" id="teacher_fin_access"  aria-label="Default select example" >
                                @if($teacher_fin_access=='Yes')
                                   <option value="Yes">Yes</option>
                                   <option value="">No</option>
                                 @else
                                   <option value="">No</option>
                                   <option value="Yes">Yes</option>
                                  @endif
                          </select>
                   </div>
              </div>


           </div>


          

            


          

          
           

           <input type="hidden" name="id" value="{{$id}}"/>

                          </div>
                        </div>
                 </div>


                 <h2 class="mx-3">Teacher Subject  Access</h2>

                 @if(Session::has('success'))
                 <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                          {{Session('success')}}
									</div>
                @else
             @endif

                    
                      <div class="col-lg-12 mx-4 pb-3 bg-light"  id="teacher_attr_box">
                         <div class="row">
                         <div class="col-lg-2 mx-2">
                                <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                             </div>

                             <div class="col-lg-2 mx-2">
                                <label class=""><b>Lavel</b> <span>[Needed Moral,Main,Additional subject]  </span></label>
                             </div>

                             <div class="col-lg-4 mx-2">
                                <label class=""><b>Subject Code<span style="color:red;"> * </span></b></label>
                             </div>

                             <div class="col-lg-3 mx-2">
                                <label class=""><b><span style="color:red;">  </span></b></label>
                             </div>
                         </div>
                          @php
                              $loop_count_num=1;
                              $loop_count_prev=$loop_count_num;
                          @endphp

                        @foreach($teacherattr as $key=>$val)
                          @php
                              $loop_count_prev=$loop_count_num;
                              $tArr=(array)$val;
                          @endphp
                       
                          
                            <input id="taid" name="taid[]"  type="hidden" value="{{$tArr['id']}}"  ></span>
                               <div class="row" id="teacher_attr_{{$loop_count_num++}}">

                                     <div class="col-lg-2 mx-2 mt-2">
                                            <select id="section" class="form-control"  name="section[]"  required>
                                                      <option value="">Select Section </option>
                                                      @foreach($sectionarr as $list)
                                                      @if($tArr['section']==$list->text1)
                                                           <option  value="{{$list->text1}}" selected> 
                                                           {{$list->text1}} </option>
                                                       @else
                                                         <option  value="{{$list->text1}}" > 
                                                             {{$list->text1}} </option>
                                                          @endif
                                                       @endforeach
                                                </select> 
                                         </div>


                                     <div class="col-lg-2 mx-2 mt-2">
                                       <select id="lavel" class="form-control"  name="lavel[]"  required>
                                                    
                                                      @foreach($lavel as $list)
                                                      @if($tArr['lavel']==$list->text1)
                                                           <option  value="{{$list->text1}}" selected> 
                                                           {{$list->text1}} </option>
                                                       @else
                                                         <option  value="{{$list->text1}}" > 
                                                             {{$list->text1}} </option>
                                                          @endif
                                                       @endforeach
                                                </select> 
                                     </div>


                             <div class="col-lg-4 mx-2 mt-2">
                                    <select id="sub" class="form-control"  name="subcode[]"  required>
                                                      <option value="">Select Subjecct </option>
                                     @foreach($subject as $row)            
                                             @if($tArr['subcode']==$row->tecode)
                                                <option  value="{{$row->tecode}}" selected> 
                                                {{$row->class}}-{{$row->babu}}-{{$row->subject}} </option>
                                             @else
                                          <option value="{{$row->tecode}}">{{$row->class}}-{{$row->babu}}-{{$row->subject}}</option>
                                              @endif
                                     @endforeach	 
                                    </select>         
                            </div>
                               

                             <div class="col-lg-3 mx-2 mt-2"> 
                                     @if($loop_count_num==2)
                                         <button type="button" onClick="add_more()" class="btn btn-primary">
                                               <i class="fa fa-plus"></i>&nbsp; Add </button>                                         
                                               @else
                                        <a class="btn btn-danger" 
                                              href="{{url('teacher_attr_delete/')}}/{{$tArr['id']}}/{{$id}}" role="button"><i class="fa fa-minus"></i>Delete</a>                                     
                                              @endif
                              </div>


                              
                        </div>

                        @endforeach
                     </div>
                



         </from>


                           <br>
                          <div>
                                 <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block mx-5">
                                      <span id="payment-button-amount">Submit</span>
                              </button>
                          </div>


                          <br><br>

         <script>

                 var loop_count=1;
                  function add_more(){
                        loop_count++;
                          var   html=' <input id="taid" name="taid[]"  type="hidden"   ></span>\
                          <div class="col-lg-12 mt-2">\
                                     <div class="row"  id="teacher_attr_'+loop_count+'">';

                          
                               var section_html=jQuery('#section').html();   
                                 section_html=section_html.replace("selected","");
                     
                                html+='<div class="col-lg-2 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="section[]" required\
                                           >'+section_html+'</select></div>\
                                 </div>';  


                                 var lavel_html=jQuery('#lavel').html();   
                                 lavel_html=lavel_html.replace("selected","");
                     
                               html+='<div class="col-lg-2 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="lavel[]" required\
                                           >'+lavel_html+'</select></div>\
                                 </div>';  

                                 var sub_html=jQuery('#sub').html();   
                                  sub_html=sub_html.replace("selected","");
                     
                               html+='<div class="col-lg-4 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="subcode[]" required\
                                           >'+sub_html+'</select></div>\
                                 </div>';  
     
                                 

                        
                                     
                            html+=' <div class="col-lg-3 mx-2">\
                                          <button type="button" onclick=remove_more("'+loop_count+'") class="btn btn-danger">\
                                            <i class="fa fa-minus"></i>&nbsp;Remove</button>\
                           </div>' ;   

                             html+='</div> </div> ';
                       
                    jQuery('#teacher_attr_box').append(html);
                     }


              function remove_more(loop_count){
                   jQuery('#teacher_attr_'+loop_count).remove();
                         //alert(loop_count);
               }

        </script>           


@endsection     
