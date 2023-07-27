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
                <label class=""><b> <span style="color:red;"> </span></b></label>

                  <div class="row">

                    <div class="col-4">
                         
                     </div>

                     <div class="col-5">
                       
                     </div>

                     <div class="col-3">
                         
                     </div>

                                                

                   </div>
               </div> 
            </div>


             <div class="col-lg-4 mt-2"> 
                <div class="form-group  my-2">
                     <label class=""><b><span style="color:red;"> </span></b></label>
                      
                   </div>
              </div>


           </div>


          

            


          

          
           

           <input type="hidden" name="id" value="{{$id}}"/>

                          </div>
                        </div>
                 </div>


                 @if(Session::has('success'))
                         <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                             {{Session('success')}}
							    </div>
                      @else
                 @endif

                  <h5 class="mx-3"> Subject  Access</h5>
                      <div class="col-lg-12 mx-4 pb-5 bg-light"  id="teacher_attr_box">
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


                     <h5 class="mx-3">Finance  Access</h5>
                      <div class="col-lg-12 mx-4 pb-5 bg-light"  id="fin_attr_box">
                         <div class="row">
                             <div class="col-lg-2 mx-2">
                                 <label class=""><b>Class<span style="color:red;">  *  </span></b></label>
                             </div>

                             <div class="col-lg-2 mx-2">
                                 <label class=""><b>Group</b> <span style="color:red;"> *  </span> </label>
                             </div>

                             <div class="col-lg-4 mx-2">
                                  <label class=""><b>Section<span style="color:red;">  *  </span></b></label>
                             </div>

                             <div class="col-lg-3 mx-2">
                                <label class=""><b><span style="color:red;">  </span></b></label>
                             </div>
                         </div>

                       @php
                              $floop_count_num=1;
                              $floop_count_prev=$floop_count_num;
                       @endphp

                        @foreach($finattr as $key=>$val)
                           @php
                              $floop_count_prev=$floop_count_num;
                              $fArr=(array)$val;
                           @endphp
                       
                          
                         <input id="faid" name="faid[]"  type="hidden" value="{{$fArr['id']}}"  ></span>
                               <div class="row" id="fin_attr_{{$floop_count_num++}}">

                                 <div class="col-lg-2 mx-2 mt-2">
                                  <select class="form-select" id="fclass"  name="fclass[]"  aria-label="Default select example" required>
                                    <option value="">Select</option>
                                    @foreach($class as $row)
                                        @if($fArr['class']==$row->text1)
                                           <option value="{{$row->text1}}" selected>{{$row->text2}}</option>
                                        @else
                                           <option value="{{$row->text1}}">{{$row->text2}}</option>
                                        @endif
                                    @endforeach
                               </select>
                                         </div>


                                 <div class="col-lg-2 mx-2 mt-2">
                                     <select class="form-select" id="fbabu"  name="fbabu[]"  aria-label="Default select example" required>
                                          <option value="">Select</option>
                                               @foreach($group as $list)
                                                       @if($fArr['babu']==$list->text1)
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
                                <select class="form-select" id="fsection"  name="fsection[]"   aria-label="Default select example" required>
                                   <option value="">Select</option>
                                              @foreach($sectionarr as $list)
                                                    @if($fArr['section']==$list->text1)
                                                       <option  value="{{$list->text1}}" selected> 
                                                         {{$list->text1}} </option>
                                                    @else
                                                      <option  value="{{$list->text1}}" > 
                                                          {{$list->text1}} </option>
                                                    @endif
                                                 @endforeach
                               </select>   
                            </div>
                               

                             <div class="col-lg-3 mx-2 mt-2"> 
                                     @if($floop_count_num==2)
                                         <button type="button" onClick="fadd_more()" class="btn btn-primary">
                                               <i class="fa fa-plus"></i>&nbsp; Add </button>                                         
                                               @else
                                        <a class="btn btn-danger" 
                                              href="{{url('fin_attr_delete/')}}/{{$fArr['id']}}/{{$id}}" role="button"><i class="fa fa-minus"></i>Delete</a>                                     
                                              @endif
                              </div>
                        </div>

                        @endforeach
                     </div>



                     <h5 class="mx-3">Attendence  Access</h5>
                      <div class="col-lg-12 mx-4 pb-5 bg-light"  id="att_attr_box">
                         <div class="row">
                             <div class="col-lg-2 mx-2">
                                 <label class=""><b>Class<span style="color:red;"> * </span></b></label>
                             </div>

                             <div class="col-lg-2 mx-2">
                                 <label class=""><b>Group</b> <span style="color:red;">* </span> </label>
                             </div>

                             <div class="col-lg-4 mx-2">
                                  <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                             </div>

                             <div class="col-lg-3 mx-2">
                                <label class=""><b><span style="color:red;">  </span></b></label>
                             </div>
                         </div>
                          @php
                              $aloop_count_num=1;
                              $aloop_count_prev=$aloop_count_num;
                          @endphp

                        @foreach($attattr as $key=>$val)
                          @php
                              $aloop_count_prev=$aloop_count_num;
                              $aArr=(array)$val;
                          @endphp
                       
                          
                         <input id="aaid" name="aaid[]"  type="hidden" value="{{$aArr['id']}}"  ></span>
                               <div class="row" id="att_attr_{{$aloop_count_num++}}">

                                 <div class="col-lg-2 mx-2 mt-2">
                                  <select class="form-select" id="aclass"  name="aclass[]"  aria-label="Default select example" required>
                                    <option value="">Select</option>
                                    @foreach($class as $row)
                                        @if($aArr['class']==$row->text1)
                                           <option value="{{$row->text1}}" selected>{{$row->text2}}</option>
                                        @else
                                           <option value="{{$row->text1}}">{{$row->text2}}</option>
                                        @endif
                                    @endforeach
                               </select>
                                         </div>


                                 <div class="col-lg-2 mx-2 mt-2">
                                     <select class="form-select" id="ababu"  name="ababu[]"  aria-label="Default select example" required>
                                          <option value="">Select</option>
                                               @foreach($group as $list)
                                                       @if($aArr['babu']==$list->text1)
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
                                <select class="form-select" id="asection"  name="asection[]"   aria-label="Default select example" required>
                                   <option value="">Select</option>
                                              @foreach($sectionarr as $list)
                                                    @if($aArr['section']==$list->text1)
                                                       <option  value="{{$list->text1}}" selected> 
                                                         {{$list->text1}} </option>
                                                    @else
                                                      <option  value="{{$list->text1}}" > 
                                                          {{$list->text1}} </option>
                                                    @endif
                                                 @endforeach
                               </select>   
                            </div>
                               

                             <div class="col-lg-3 mx-2 mt-2"> 
                                     @if($aloop_count_num==2)
                                         <button type="button" onClick="aadd_more()" class="btn btn-primary">
                                               <i class="fa fa-plus"></i>&nbsp; Add </button>                                         
                                               @else
                                        <a class="btn btn-danger" 
                                              href="{{url('att_attr_delete/')}}/{{$aArr['id']}}/{{$id}}" role="button"><i class="fa fa-minus"></i>Delete</a>                                     
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



               var floop_count=1;
                  function fadd_more(){
                        floop_count++;
                          var   html=' <input id="faid" name="faid[]"  type="hidden"   ></span>\
                          <div class="col-lg-12 mt-2">\
                                     <div class="row"  id="fin_attr_'+floop_count+'">';

                          
                               var class_html=jQuery('#fclass').html();   
                                 class_html=class_html.replace("selected","");
                     
                                html+='<div class="col-lg-2 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="fclass[]" required\
                                           >'+class_html+'</select></div>\
                                 </div>'; 
                                 
                                 
                                 var babu_html=jQuery('#fbabu').html();   
                                   babu_html=babu_html.replace("selected","");
                     
                                html+='<div class="col-lg-2 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="fbabu[]" required\
                                           >'+babu_html+'</select></div>\
                                 </div>';  


                               var section_html=jQuery('#fsection').html();   
                                 section_html=section_html.replace("selected","");
                     
                                html+='<div class="col-lg-4 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="fsection[]" required\
                                           >'+section_html+'</select></div>\
                                 </div>';  

                                     
                            html+=' <div class="col-lg-3 mx-2">\
                                          <button type="button" onclick=fremove_more("'+floop_count+'") class="btn btn-danger">\
                                            <i class="fa fa-minus"></i>&nbsp;Remove</button>\
                           </div>' ;   

                             html+='</div> </div> ';
                       
                    jQuery('#fin_attr_box').append(html);
                     }

              function fremove_more(floop_count){
                   jQuery('#fin_attr_'+floop_count).remove();
                         //alert(loop_count);
               }


               var aloop_count=1;
                  function aadd_more(){
                        aloop_count++;
                          var   html=' <input id="aaid" name="aaid[]"  type="hidden"   ></span>\
                          <div class="col-lg-12 mt-2">\
                                     <div class="row"  id="att_attr_'+aloop_count+'">';

                          
                               var class_html=jQuery('#aclass').html();   
                                 class_html=class_html.replace("selected","");
                     
                                html+='<div class="col-lg-2 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="aclass[]" required\
                                           >'+class_html+'</select></div>\
                                 </div>'; 
                                 
                                 
                                 var babu_html=jQuery('#ababu').html();   
                                   babu_html=babu_html.replace("selected","");
                     
                                html+='<div class="col-lg-2 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="ababu[]" required\
                                           >'+babu_html+'</select></div>\
                                 </div>';  


                               var section_html=jQuery('#asection').html();   
                                   section_html=section_html.replace("selected","");
                     
                                html+='<div class="col-lg-4 mx-2">\
                                        <div class="form-group has-success">\
                                            <select   class="form-control" name="asection[]" required\
                                           >'+section_html+'</select></div>\
                                 </div>';  

                                     
                            html+=' <div class="col-lg-3 mx-2">\
                                          <button type="button" onclick=aremove_more("'+aloop_count+'") class="btn btn-danger">\
                                            <i class="fa fa-minus"></i>&nbsp;Remove</button>\
                           </div>' ;   

                             html+='</div> </div> ';
                       
                    jQuery('#att_attr_box').append(html);
                     }

              function aremove_more(aloop_count){
                   jQuery('#att_attr_'+aloop_count).remove();
                         //alert(loop_count);
               }

        </script>           


@endsection     
