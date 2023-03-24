@extends('school/schoolheader')
@section('attenindex','active')
@section('content')
           <h4 class="mt-4">View Attendance</h4>
                  <ol class="breadcrumb mb-4">
                       <li class="breadcrumb-item active">/View Attendance</li>
                   </ol>

                   <div class="form-group  mx-3 my-3">
                           @if(Session::has('danger'))
                   <div  class="alert alert-danger"> {{Session::get('danger')}}</div>
                                @endif
                             </div>

                 <div class="row">
                     <div class="col-sm-5">
                       <div class="card bg-light">
                       <form action="{{url('pdf/atten')}}" method="post" enctype="multipart/form-data">
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
                         <label class=""><b>Date <span style="color:red;"> * </span></b> </label>
                         <input type="month" name="month" id="date" class="form-control" required>   
                   </div> 


                   <div class="form-group  mx-3 my-3">
                          <label class=""><b>Group<span style="color:red;"> * </span></b></label>
                          <select class="form-select" name="babu" id="babu"  required >
                                   <option value="">Select</option>
                                  @foreach($group as $row)
                                      <option value="{{$row->text1}}">{{$row->text2}}</option>
                                  @endforeach	 
                          </select>
                   </div> 



                    <div class="form-group  mx-3 my-3">
                          <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                          <select class="form-select" name="section" id="section"  required>
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
             </div>

           

@endsection     