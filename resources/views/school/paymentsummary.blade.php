@extends('school/schoolheader')
@section('payment-summary','active')
@section('content')
     <h4 class="mt-4">Overall Summary  </h4>
           <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
           </ol>
                     @if(Session::has('fail'))
                   <div  class="alert alert-danger"> {{Session::get('fail')}}</div>
                           @endif
                             </div>
     @if(Session::has('school'))     
                <div class="row my-3">
                     <div class="col-xl-4 col-md-6">
                        <div class="card bg-light">   
                        <div class="mx-3 my-3">
                            Class Wise Summary
                        </div>

                
                     <form action="{{ url('class-wise-pdf') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                               <div class="form-group  mx-3 my-3">
                                    <label class=""><b>Class<span style="color:red;"> * </span></b></label>
                                  <select class="form-select" name="class" id="class"  aria-label="Default select example" required>
                                     <option value="">Select</option>
                                       @foreach($class as $row)
                                    <option value="{{$row->text1}}">{{$row->text2}}</option>
                                         @endforeach
                                  </select>
                              </div> 

                                
                           <div class="form-group  mx-3 my-3">
                              <label class=""><b>Group<span style="color:red;"> * </span></b></label>
                               <select class="form-select" name="babu" id="babu"  aria-label="Default select example" required>
                                   <option value="">Select</option>
                                    @foreach($group as $row)
                                   <option value="{{$row->text1}}">{{$row->text2}}</option>
                                   @endforeach	 
                                </select>
                           </div> 


                          <div class="form-group  mx-3 my-3">
                              <label class=""><b>Section</b></label>
                              <select class="form-select" name="section" id="section"  aria-label="Default select example" >
                                  <option value="">Select</option>
                                    @foreach(Session::get('sectionarr') as $list)                                                  
                                     <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                    @endforeach
                                </select>
                          </div> 

                          <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light">
                             </div> 

                       </form>
                   </div>
              </div>


                    <div class="col-xl-4 col-md-6">
                     <div class="card bg-light">    
                     <div class="mx-3 my-3">
                            Payment Summary
                        </div> 
                        <form action="{{ url('payment-month') }}" method="post" enctype="multipart/form-data">
                               {!! csrf_field() !!}

                           <div class="form-group  mx-3 my-3">
                               <label class=""><b>Year<span style="color:red;"> * </span></b></label>
                               <input type="number"  id="year" name="year"   class="form-control" required>
                           </div> 


                           <div class="form-group  mx-3 my-3">
                               <label class=""><b>Month<span style="color:red;">  </span></b></label>
                               <input type="number"  id="month" name="month"   class="form-control" >
                           </div> 


                           <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Payment Type<span style="color:red;"> * </span></b></label>
                                    <select class="form-select" name="payment_type" id="payment_type"  aria-label="Default select example" required>
                                        <option value="">Select</option>                      
                                        <option value="Offline">Offline</option> 
                                        <option value="Online">Online</option>   
                                    </select>
                           </div> 


                          <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light">
                             </div> 

                              </form>
                               </div>
                            </div>

              <div class="col-xl-4 col-md-6">
                   <div class="card bg-light">   
                   <div class="mx-3 my-3">
                             Spend Summary
                        </div>   
                        <form action="{{ url('spend-month') }}" method="post" enctype="multipart/form-data">
                               {!! csrf_field() !!}
                               <div class="form-group  mx-3 my-3">
                               <label class=""><b>Year<span style="color:red;"> * </span></b></label>
                               <input type="number"  id="year" name="year"   class="form-control" required>
                           </div> 


                             <div class="form-group  mx-3 my-3">
                                   <label class=""><b>Month<span style="color:red;">  </span></b></label>
                                   <input type="number"  id="month" name="month"   class="form-control" >
                            </div>
                           
                           

                               <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light">
                               </div> 

                         </form>
                   </div>
            </div>
            
            <br><br><br>

       @endif
                  



                <div class="row ">
                     <div class="col-xl-4 col-md-6">
                        <div class="card bg-light">   
                        <div class="mx-3 my-3">
                            Payment Summary Class Wise 
                        </div>

                
                     <form action="{{ url('class-wise-payment') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                               <div class="form-group  mx-3 my-3">
                                    <label class=""><b>Class<span style="color:red;"> * </span></b></label>
                                  <select class="form-select" name="class" id="class"  aria-label="Default select example" required>
                                     <option value="">Select</option>
                                       @foreach($class as $row)
                                    <option value="{{$row->text1}}">{{$row->text2}}</option>
                                         @endforeach
                                  </select>
                              </div> 

                                
                           <div class="form-group  mx-3 my-3">
                              <label class=""><b>Group<span style="color:red;"> * </span></b></label>
                               <select class="form-select" name="babu" id="babu"  aria-label="Default select example" required>
                                   <option value="">Select</option>
                                    @foreach($group as $row)
                                   <option value="{{$row->text1}}">{{$row->text2}}</option>
                                   @endforeach	 
                                </select>
                           </div> 


                          <div class="form-group  mx-3 my-3">
                              <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                              <select class="form-select" name="section" id="section"  aria-label="Default select example" >
                                  <option value="">Select</option>
                                    @foreach(Session::get('sectionarr') as $list)                                                  
                                     <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                    @endforeach
                                </select>
                          </div> 

                          <div class="form-group  mx-3 my-3">
                               <label class=""><b>Year<span style="color:red;"> * </span></b></label>
                               <input type="number"  id="year" name="year"   class="form-control" required>
                           </div> 


                           <div class="form-group  mx-3 my-3">
                               <label class=""><b>Month<span style="color:red;">  </span></b></label>
                               <input type="number"  id="month" name="month"   class="form-control" >
                           </div> 


                           <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Payment Type<span style="color:red;"> * </span></b></label>
                                    <select class="form-select" name="payment_type" id="payment_type"  aria-label="Default select example" required>
                                        <option value="">Select</option>                      
                                        <option value="Offline">Offline</option> 
                                        <option value="Online">Online</option>   
                                    </select>
                           </div> 


                          <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light">
                             </div> 

                       </form>
                   </div>
               </div>




              </div>



      
                 
                  <br>

                     

      @endsection