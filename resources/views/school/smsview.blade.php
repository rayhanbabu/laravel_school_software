@extends('school/schoolheader')
@section('smsview','active')
@section('content')

          <h4 class="mt-4">SMS Send , Available SMS({{$sms}})</h4>
                <ol class="breadcrumb mb-4">
                       
                 </ol>
                 <div class="container mt-3">

                 <div class="form-group  mx-2 my-2">
                      @if(Session::has('success'))
                       <div  class="alert alert-success"> {{Session::get('success')}}</div>
                      @endif
                      @if(Session::has('danger'))
                       <div  class="alert alert-danger"> {{Session::get('danger')}}</div>
                      @endif
                   </div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#single">Single</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#teachers">Teachers </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#students">Students</a>
    </li>

    <li class="nav-item">
       <a class="nav-link" data-bs-toggle="tab" href="#payment">Payment</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#result">Result</a>
    </li>

    <li class="nav-item">
         <a class="nav-link" data-bs-toggle="tab" href="#attendance">Attendance</a>
    </li>

      <li class="nav-item">
         <a class="nav-link" data-bs-toggle="tab" href="#update">Text Update</a>
      </li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="single" class="container tab-pane active"><br>
         <h3>Single</h3>

               <div class="row">
                  <div class="col-sm-6">
                       <div class="card bg-light">
                       <form action="{{ url('school/smsinsert') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             <input type ="hidden" name="sms_type" id="sms_type" value="single">
                             
                             <div class="form-group  mx-3 my-3">
                                   <label class=""><b>Phone Number(88)</b></label>
                                  <input type="mumber" name="phone" pattern="[0][1][3 4 7 6 5 8 9][0-9]{8}" title="
				                            Please select Valid mobile number" class="form-control" required>
                              </div> 
                              <div class="form-group  mx-3 my-3">
                                   <label class=""><b>Message</b></label>
                                   <textarea name="text" id="text" col="15" rows="3" maxlength="158" class="form-control" required></textarea>
                              </div> 
                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Send massage" class="btn btn-primary waves-effect waves-light">
                              </div>
                      </form>
                    </div>
                 </div>
              </div>
        </div>


    <div id="teachers" class="container tab-pane fade"><br>
        <h3>Teachers </h3>
              <div class="row">
                   <div class="col-sm-6">
                       <div class="card bg-light">
                       <form action="{{ url('school/smsinsert') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             <input type ="hidden" name="sms_type" id="sms_type" value="teachers">
                              <div class="form-group  mx-3 my-3">
                                   <label class=""><b>Message</b></label>
                                   <textarea name="text" id="text" col="15" rows="3" maxlength="172" class="form-control" required></textarea>
                              </div>
                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Send massage" class="btn btn-primary waves-effect waves-light">
                              </div>
                      </form>
                    </div>
                 </div>
              </div>

       </div>


     <div id="students" class="container tab-pane fade"><br>
         <h3>Students</h3>
             <div class="row">
                   <div class="col-sm-6">
                       <div class="card bg-light">
                       <form action="{{ url('school/smsinsert') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             <input type ="hidden" name="sms_type" id="sms_type" value="students">

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
                           <select class="form-select" name="section" id="section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                            </select>
                       </div> 


                              <div class="form-group  mx-3 my-3">
                                   <label class=""><b>Message</b></label>
                                   <textarea name="text" id="text" col="15" rows="3" maxlength="172" class="form-control" required></textarea>
                              </div>
                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Send massage" class="btn btn-primary waves-effect waves-light">
                              </div>
                      </form>
                    </div>
                 </div>
              </div>
         
       </div>

     <div id="payment" class="container tab-pane fade"><br>
       <h3>Payment</h3>
             <div class="row">
                   <div class="col-sm-6">
                       <div class="card bg-light">
                       <form action="{{ url('school/smsinsert') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             <input type ="hidden" name="sms_type" id="sms_type" value="payment">
                             
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
                           <select class="form-select" name="section" id="section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                            </select>
                       </div> 


                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Send massage" class="btn btn-primary waves-effect waves-light">
                              </div>
                      </form>
                    </div>
                 </div>
              </div>
      </div>

     <div id="result" class="container tab-pane fade"><br>
        <h3>Result</h3>
             <div class="row">
                   <div class="col-sm-6">
                       <div class="card bg-light">
                       <form action="{{ url('school/smsinsert') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             <input type ="hidden" name="sms_type" id="sms_type" value="result">
                             
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
                           <select class="form-select" name="section" id="section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                            </select>
                       </div> 

                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Send massage" class="btn btn-primary waves-effect waves-light">
                              </div>
                      </form>
                    </div>
                 </div>
              </div>
     </div>

    <div id="attendance" class="container tab-pane fade"><br>
        <h3>Attendance</h3>
            <div class="row">
                   <div class="col-sm-6">
                       <div class="card bg-light">
                       <form action="{{ url('school/smsinsert') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             <input type ="hidden" name="sms_type" id="sms_type" value="Result">
                             
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
                           <select class="form-select" name="section" id="section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                            </select>
                       </div> 

                          <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Date</b></label>
                                  <input type="date"   name="date" class="form-control">
                            </div> 


                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Send massage" class="btn btn-primary waves-effect waves-light">
                              </div>
                      </form>
                    </div>
                 </div>
              </div>
      
       </div>

    <div id="update" class="container tab-pane fade"><br>
      <h3>Update</h3>
      <div class="row">
                     <div class="col-sm-12">
                       <div class="card bg-light">
                       <form action="{{ url('school/smstext_update') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             
                             <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Payment(Maxlength=100)</b></label>
                                  <input type="text"  value="{{$school->sms_text1}}" maxlength="100" name="sms_text1" class="form-control">
                            </div> 

                             <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Result</b></label>
                                  <input type="text"  value="{{$school->sms_text2}}"  maxlength="100" name="sms_text2" class="form-control">
                             </div> 

                             <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Attendance</b></label>
                                  <input type="text"  value="{{$school->sms_text3}}"  maxlength="100" name="sms_text3" class="form-control">
                              </div>

                              <div class="form-group  mx-3 my-3">
                                 <label class=""><b>Others</b></label>
                                  <input type="text"  value="{{$school->sms_text4}}"  maxlength="100" name="sms_text4" class="form-control">
                              </div>

                              <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Update" class="btn btn-primary waves-effect waves-light">
                             </div> 

                     </form>
                   </div>
                </div>
             </div>
    </div>

  </div>
</div>

               


@endsection     