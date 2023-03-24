@extends('admin/dashboardheader')
@section('content')

<div class="row mt-4 mb-0">
               <div class="col-5"> <h4 class="mt-0"> Student Marks Table View , Section : {{$admin->admin_section}}</h4></div>
                     <div class="col-1">
                     <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                        
                     </div>
                     </div>
                     <div class="col-2">
                         <div class="d-grid gap-2 d-md-flex ">
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Update 
                        </button>
                         </div>
                     </div>
                     
                      <div class="col-2">
                          <div class="d-grid gap-2 d-md-flex ">
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropdelete">
                                 Delete 
                             </button>
                          </div>
                      </div> 

                      <div class="col-2">
                          <div class="d-grid gap-2 d-md-flex ">
                              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdropstudent">
                                 Insert Student Table 
                             </button>
                          </div>
                      </div> 

             </div>  


             <div class="form-group  mx-2 my-2">
                           @if(Session::has('fail'))
                   <div  class="alert alert-danger"> {{Session::get('fail')}}</div>
                                @endif
                             </div>

                             <div class="form-group  mx-2 my-2">
                           @if(Session::has('success'))
                   <div  class="alert alert-success"> {{Session::get('success')}}</div>
                                @endif
                             </div> 
  
                        

<div class="card-block table-border-style">                     
 <div class="table-responsive">
  <table class="table table-bordered" id="employee_data">
    <thead>
      <tr>
         
           <th width="5%" >EIIN</th>
           <th width="5%" >Stu Id</th>
	         <th width="5%" >Roll </th>
           <th width="5%" >Class</th>
           <th width="5%" >Exam</th>
           <th width="5%" >Year</th>
           <th width="5%" >Group</th>
           <th width="5%" >Section</th>
           <th width="20%" >Name</th>
           <th width="5%" >Total</th>
           <th width="5%" > Gpa</th>
           <th width="5%" > Grade</th>
           <th width="5%" >Fixed Gpa</th>
      </tr>
    </thead>
    <tbody>

	@foreach($student as $row)
	      <tr>
              <td>{{$row->eiin}}</td>
              <td>{{$row->stu_id}}</td>
              <td>{{$row->roll}}</td>
              <td>{{$row->class}}</td>
              <td>{{$row->babu}}</td>
              <td>{{examName($row->exam)}}</td>
              <td>{{$row->year}}</td>
              <td>{{$row->section}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->total}}</td>
              <td>{{$row->gpa}}</td>
              <td>{{$row->g}}</td>
             <td>{{$row->fgp}}</td>
	      </tr>
    @endforeach	 
	</tbody>
   </table>

  <script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "asc" ]] ,
	   "lengthMenu": [[15, 50, 100, -1], [10, 50, 100, "All"]]
      }
	  );  
  });  
 </script>  
</div>
</div>


<!-- Modal  ADD  -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <div class="modal-body">
      <form method="post" action="{{url('admin/marksupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="eiin" class="form-control" value="{{$admin->eiin}}" required>

         


          <div class="form-group  col-sm-6  my-2">
               <label class=""><b> From Class </b></label>
               <select class="form-select" name="fclass"  aria-label="Default select example" required>
                    <option value="">Select</option>
                     @foreach($classarr as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

          <div class="form-group  col-sm-6  my-2">
               <label class=""><b> To Class </b></label>
               <select class="form-select" name="tclass"  aria-label="Default select example" required>
                    <option value="">Select</option>
                    @foreach($classarr as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>From Group</b></label>
               <select class="form-select" name="fbabu"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($group as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

          <div class="form-group col-sm-6   my-2">
               <label class=""><b>To Group</b></label>
               <select class="form-select" name="tbabu"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($group as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>



          <div class="form-group col-sm-6  my-2">
               <label class=""><b>From Year</b></label>
               <select class="form-select" name="fyear"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($year as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>To Year</b></label>
               <select class="form-select" name="tyear"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($year as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>From Exam</b></label>
               <select class="form-select" name="fexam"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($exam as $row)
                     <option value="{{$row->serial}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>To Exam</b></label>
               <select class="form-select" name="texam"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($exam as $row)
                     <option value="{{$row->serial}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


    

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>From Section</b></label>
               <select class="form-select" name="fsection"  aria-label="Default select example" required>
                     <option value="">Select</option>
                                   @foreach($section as $list)                                                  
                                        <option  value="{{$list->text1}}" > 
                                            {{$list->text1}} </option>                                                        
                                     @endforeach
           </select>
          </div>

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>To Section</b></label>
               <select class="form-select" name="tsection"  aria-label="Default select example" required>
                     <option value="">Select</option>
                             @foreach($section as $list)                                                  
                                  <option  value="{{$list->text1}}" > 
                                      {{$list->text1}} </option>                                                        
                              @endforeach
           </select>
          </div>
         
      </div>     
      <input type="submit"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



    <!-- Modal  ADD  -->
<div class="modal fade" id="staticBackdropdelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Student Maks table</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/marksdelete')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="eiin" class="form-control" value="{{$admin->eiin}}" required>


          <div class="form-group  col-sm-6  my-2">
               <label class=""><b> Class </b></label>
               <select class="form-select" name="class"  aria-label="Default select example" required>
                    <option value="">Select</option>
                     @foreach($classarr as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Group</b></label>
               <select class="form-select" name="babu"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($group as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Section</b></label>
               <select class="form-select" name="section"  aria-label="Default select example" required>
                     <option value="">Select</option>
                        @foreach($section as $list)                                                  
                               <option  value="{{$list->text1}}" > 
                                    {{$list->text1}} </option>                                                        
                         @endforeach
           </select>
          </div>

          <div class="form-group col-sm-6  my-2">
               <label class=""><b> Year</b></label>
               <select class="form-select" name="year"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($year as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6  my-2">
               <label class=""><b> Exam</b></label>
               <select class="form-select" name="exam"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($exam as $row)
                     <option value="{{$row->serial}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


         
      </div>     
      <input type="submit" onclick="return confirm('Are you sure you want to Delete  this Items?')"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    
        
    <!-- Modal  ADD  -->
  <div class="modal fade" id="staticBackdropstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insert from Student </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/marksstudent')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="eiin" class="form-control" value="{{$admin->eiin}}" required>


          <div class="form-group  col-sm-6  my-2">
               <label class=""><b> Class </b></label>
               <select class="form-select" name="class"  aria-label="Default select example" required>
                    <option value="">Select</option>
                     @foreach($classarr as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6   my-2">
               <label class=""><b>Group</b></label>
               <select class="form-select" name="babu"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($group as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Section</b></label>
               <select class="form-select" name="section"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     @foreach($section as $row)
                     <option value="{{$row->text1}}">{{$row->text2}}</option>
                     @endforeach	 
           </select>
          </div>

         


         
      </div>     
      <input type="submit" onclick="return confirm('Are you sure you want to Delete  this Items?')"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3"/>
              
    </form>
       </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           </div>
      </div>
    </div>
  </div> 



@endsection



