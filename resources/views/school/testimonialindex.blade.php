@extends('school/schoolheader')
@section('testimonialindex','active')
@section('content')
          <h4 class="mt-4">Testimonial Pdf View </h4>
                 <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active">/Testimonial</li>
                 </ol>

                 <div class="row">
                     <div class="col-sm-5">
                       <div class="card bg-light">
                <form action="{{ url('pdf/testimonial') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             
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
                         <label class=""><b>Class<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="class" id="class"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($class as $row)
                               <option value="{{$row->text1}}">{{$row->text2}}</option>
                                 @endforeach
                        </select>
                  </div> 


                  <div class="form-group  mx-3 my-3">
                         <label class=""><b>Section<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="section" id="section"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                         </select>
                   </div> 


                   <div class="form-group  mx-3 my-3">
                         <label class=""><b>Exam Year<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="year" id="year"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($year as $row)
                                  <option value="{{$row->text1}}">{{$row->text2}}</option>
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