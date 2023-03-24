@extends('student/dashboardheader')
@section('content')

                        <h4 class="mt-4">Result View</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>


                        <div class="form-group  mx-3 my-3">
                           @if(Session::has('danger'))
                   <div  class="alert alert-danger"> {{Session::get('danger')}}</div>
                                @endif
                             </div>

                 <div class="row">
                     <div class="col-sm-5">
                       <div class="card bg-light">
                       <form method="post"  id="email_form"  class="myform"  enctype="multipart/form-data" >
                        
                             

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

                 
          <input type="hidden" name="eiin" id="eiin" value="{{Session::get('student')->eiin}}" class="form-control" required>
         <input type="hidden" name="stu_id" id="stu_id" value="{{Session::get('student')->stu_id}}" class="form-control" required>



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

             $(document).on('submit', '#email_form', function(e){
              e.preventDefault();
                  var exam=$('#exam').val();
                  var year=$('#year').val();
                  var stu_id=$('#stu_id').val();
                  var eiin=$('#eiin').val();
                 location.href='/results/'+eiin+'/'+exam+'/'+year+'/'+stu_id;
             
            });

            });

           </script>




@endsection