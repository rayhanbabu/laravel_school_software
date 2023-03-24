@extends('school/schoolheader')
@section('invoicesummary','active')
@section('content')
     <h4 class="mt-4">Invoice Summary  </h4>
           <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
           </ol>


                <div class="row">
                     <div class="col-xl-4 col-md-6">
                        <div class="card bg-light">   

                     <form action="{{ url('invoicepart1') }}" method="post" enctype="multipart/form-data">
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
                              <label class=""><b>Month<span style="color:red;"> * </span></b></label>
                              <input type="month"  id="month" name="month"   class="form-control " required>
                           </div> 


                            <div class="form-group  mx-3 my-3">
                                  <label class=""><b>Status<span style="color:red;"> * </span></b></label>
                                  <select class="form-select" name="status" id="status"  aria-label="Default select example" required >
                                      <option value="">Select</option>
                                      <option value="1">Paid</option>
                                      <option value="0">Not Paid</option>
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
                        <form action="{{ url('invoicepart2') }}" method="post" enctype="multipart/form-data">
                               {!! csrf_field() !!}


                           <div class="form-group  mx-3 my-3">
                              <label class=""><b>Month<span style="color:red;"> * </span></b></label>
                              <input type="month"  id="month" name="month"   class="form-control" required>
                           </div> 


                           <div class="form-group  mx-3 my-3">
                              <label class=""><b>Status<span style="color:red;"> * </span></b></label>
                               <select class="form-select" name="status" id="status"  aria-label="Default select example" required>
                                    <option value="">Select</option>
                                    <option value="1">Paid</option>
                                    <option value="0">Not Paid</option>
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
                        <form action="{{ url('invoicepart3') }}" method="post" enctype="multipart/form-data">
                               {!! csrf_field() !!}

                               <div class="form-group  mx-3 my-3">
                                   <label class=""><b>Month<span style="color:red;"> * </span></b></label>
                                   <input type="month"  id="month" name="month"   class="form-control" required>
                               </div> 

                               <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light">
                               </div> 

                         </form>
                   </div>

                    <br>

                  
              </div>




                 </div>      
                 
                  <br>

                     

      @endsection