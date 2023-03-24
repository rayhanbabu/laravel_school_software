@extends('school/schoolheader')
@section('tabulationindex','active')
@section('content')
          <h4 class="mt-4">Tabulation Sheets Pdf View </h4>
                   <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">/Tabulation Sheets</li>
                   </ol>

                 <div class="row">
                     <div class="col-sm-5">
                         
                            @if(Session::has('fail'))
                      <div  class="alert alert-danger"> {{Session::get('fail')}}</div>
                                @endif
                       <div class="card bg-light">
                       <form action="{{ url('pdf/tabulation') }}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                             
                  <div class="form-group  mx-3 my-3">
                         <label class=""><b>Examination<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="exam" id="exam"  aria-label="Default select example" required>
                                  <option value="">Select</option>
                                   @foreach($exam as $row)
                                  <option value="{{$row->serial}}">{{$row->text2}}</option>
                                   @endforeach
                        </select>
                  </div> 

                  <div class="form-group  mx-3 my-3">
                         <label class=""><b>Year<span style="color:red;"> * </span></b></label>
                         <select class="form-select" name="year" id="year"  aria-label="Default select example" required>
                                 <option value="">Select</option>
                                 @foreach($year as $row)
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
                                 @foreach(Session::get('sectionarr') as $list)                                                  
                                   <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                  @endforeach
                         </select>
                   </div> 
                   
                   
         <div class="form-group  mx-3 my-3">
           <input type="checkbox" name="check_status" id="check_author"></input>Checkbox Checked If  show range wise
              <div class="row  author_input">
                         <div class="col-sm-3"> From Roll</div>
                         <div class="col-sm-3">
                                <input type="number" name="fromroll"  class="form-control">
                         </div>

                         <div class="col-sm-3"> To Roll </div> 
                         <div class="col-sm-3">
                               <input type="number" name="toroll"  class="form-control">
                         </div>  
              </div>
          </div>


                         
                         

                           <div class="form-group  mx-3 my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-light">
                             </div> 

                     </form>
                   </div>
                </div>
             </div>
             
             
     <script>  
     $(document).ready(function(){
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
                $('.author_input').hide();

     $("#check_author").on('change', function(){
        if ($("#check_author").is(":checked")) {
           $('.author_input').show();
      }else{
           $('.author_input').hide();
      }
    })

         });
   </script>

           

@endsection     