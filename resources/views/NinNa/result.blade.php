@extends('school/schoolheader')
@section('content')
 
 @if(Session::has('school'))  
       @include('NinNa/subject')
 @endif

 <div class="form-group  mx-2 my-2">
                           @if(Session::has('success'))
                   <div  class="alert alert-success"> {{Session::get('success')}}</div>
                                @endif
                </div> 

 <h5 class="mt-2">Result processing, Class: {{$name->class}}, Group: {{$name->babu}}, Section: {{Session::get('section')}}  
 <button type="button" class="btn btn-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Result Type </button>
 </h5> 

     <form  method="POST" action="{{url('Nin/Na/resultupdate')}}" enctype="multipart/form-data">
  <div class="table-responsive ms-auto" >
   <table class="table table-bordered"  id="employee_data" style="font-size:15px;" >
     <thead>
     <tr style="background: whitesmoke;">
                  <th width ="5%">Stu_ID</th>
                  <th width ="2%">Roll</th>
                  <th width ="15%">Name of Student</th>	
                  
                  @if(empty(matchsubcode($student1->sub11code,$tags))) <td></td> @else 
                  <td> {{$student1->sub11n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub12code,$tags))) <td></td> @else 
                  <td> {{$student1->sub12n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub13code,$tags))) <td></td>@else 
                  <td> {{$student1->sub13n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub14code,$tags))) <td></td> @else 
                  <td> {{$student1->sub14n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub15code,$tags))) <td></td> @else 
                  <td> {{$student1->sub15n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub16code,$tags))) <td></td> @else 
                  <td> {{$student1->sub16n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub17code,$tags))) <td></td> @else 
                  <td> {{$student1->sub17n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub18code,$tags))) <td></td> @else 
                  <td> {{$student1->sub18n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub19code,$tags))) <td></td> @else 
                  <td> {{$student1->sub19n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub20code,$tags))) <td></td> @else 
                  <td> {{$student1->sub20n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub21code,$tags))) <td></td> @else 
                  <td> {{$student1->sub21n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub22code,$tags))) <td></td> @else 
                  <td> {{$student1->sub22n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub23code,$tags))) <td></td> @else 
                  <td> {{$student1->sub23n}} </td>
                  @endif 

                  @if(empty(matchsubcode($student1->sub24code,$tags))) <td></td> @else 
                  <td> {{$student1->sub24n}} </td>
                  @endif 
            
               
                  <th width ="5%">T. Fail</th> 
                  <th width ="5%"><?php echo substr($school->exam,0,1);?>Total</th>  
                  <th width ="5%"><?php echo substr($school->exam,0,1);?>Gpa</th> 
                  <th width ="5%"><?php echo substr($school->exam,0,1);?>Grade</th>
                  <th width ="5%">Type</th>  
                  <th width="">HGPA</th>
				  <th width="">HGrade</th>
				  <th width="">CGPA</th>
				  <th width="">CGrade</th> 
                  <th width ="5%">Result</th> 
        </tr>
   </thead>
        <tbody>

    
        @foreach($student as $row)
          <tr>
              <td>{{$row->stu_id}}</td>
              <td>{{$row->roll}}</td>
              <td>{{$row->name}}</td>
              <input type="hidden" name="id[]" value="{{$row->id}}"  class="form-control" > 
              <input type="hidden" name="rs[]" value="{{$row->rs}}"  class="form-control" > 
              <input type="hidden" name="fgp[]" value="{{$row->fgp}}"  class="form-control" > 
              <input type="hidden" name="sub11gp[]" value="{{$row->sub11gp}}"  class="form-control" >
              <input type="hidden" name="sub11code[]" value="{{$row->sub11code}}"  class="form-control" >

              <input type="hidden" name="sub12gp[]" value="{{$row->sub12gp}}"  class="form-control" >
              <input type="hidden" name="sub12code[]" value="{{$row->sub12code}}"  class="form-control" >

              <input type="hidden" name="sub13gp[]" value="{{$row->sub13gp}}"  class="form-control" >
              <input type="hidden" name="sub13code[]" value="{{$row->sub13code}}"  class="form-control" >

              <input type="hidden" name="sub14gp[]" value="{{$row->sub14gp}}"  class="form-control" >
              <input type="hidden" name="sub14code[]" value="{{$row->sub14code}}"  class="form-control" >

              <input type="hidden" name="sub15gp[]" value="{{$row->sub15gp}}"  class="form-control" >
              <input type="hidden" name="sub15code[]" value="{{$row->sub15code}}"  class="form-control" >

              <input type="hidden" name="sub16gp[]" value="{{$row->sub16gp}}"  class="form-control" >
              <input type="hidden" name="sub16code[]" value="{{$row->sub16code}}"  class="form-control" >

              <input type="hidden" name="sub17gp[]" value="{{$row->sub17gp}}"  class="form-control" >
              <input type="hidden" name="sub17code[]" value="{{$row->sub17code}}"  class="form-control" >

              <input type="hidden" name="sub18gp[]" value="{{$row->sub18gp}}"  class="form-control" >
              <input type="hidden" name="sub18code[]" value="{{$row->sub18code}}"  class="form-control">

              <input type="hidden" name="sub19gp[]" value="{{$row->sub19gp}}"  class="form-control" >
              <input type="hidden" name="sub19code[]" value="{{$row->sub19code}}"  class="form-control" >

              <input type="hidden" name="sub20gp[]" value="{{$row->sub20gp}}"  class="form-control" >
              <input type="hidden" name="sub20code[]" value="{{$row->sub20code}}"  class="form-control" >

              <input type="hidden" name="sub21gp[]" value="{{$row->sub21gp}}"  class="form-control" >
              <input type="hidden" name="sub21code[]" value="{{$row->sub21code}}"  class="form-control" >

              <input type="hidden" name="sub22gp[]" value="{{$row->sub22gp}}"  class="form-control" >
              <input type="hidden" name="sub22code[]" value="{{$row->sub22code}}"  class="form-control" >

              <input type="hidden" name="sub23gp[]" value="{{$row->sub23gp}}"  class="form-control" >
              <input type="hidden" name="sub23code[]" value="{{$row->sub23code}}"  class="form-control" >

              <input type="hidden" name="sub24gp[]" value="{{$row->sub24gp}}"  class="form-control" >
              <input type="hidden" name="sub24code[]" value="{{$row->sub24code}}"  class="form-control">

                  @if(empty(matchsubcode($row->sub11code,$tags))) <td></td> @else 
                  <td> {{$row->sub11gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub12code,$tags))) <td></td> @else 
                  <td> {{$row->sub12gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub13code,$tags))) <td></td>@else 
                  <td> {{$row->sub13gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub14code,$tags))) <td></td> @else 
                  <td> {{$row->sub14gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub15code,$tags))) <td></td> @else 
                  <td> {{$row->sub15gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub16code,$tags))) <td></td> @else 
                  <td> {{$row->sub16gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub17code,$tags))) <td></td> @else 
                  <td> {{$row->sub17gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub18code,$tags))) <td></td> @else 
                  <td> {{$row->sub18gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub19code,$tags))) <td></td> @else 
                  <td> {{$row->sub19gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub20code,$tags))) <td></td> @else 
                  <td> {{$row->sub20gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub21code,$tags))) <td></td> @else 
                  <td> {{$row->sub21gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub22code,$tags))) <td></td> @else 
                  <td> {{$row->sub22gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub23code,$tags))) <td></td> @else 
                  <td> {{$row->sub23gp}} </td>
                  @endif 

                  @if(empty(matchsubcode($row->sub24code,$tags))) <td></td> @else 
                  <td> {{$row->sub24gp}} </td>
                  @endif 
            

                
              <td>{{$row->tfail}}</td>
              <td>{{$row->total}}</td>
              <td>{{$row->gpa}}</td>
              <td>{{$row->g}}</td>
              <td>{{$row->rs}}</td>
              @if($row->rs==2)
                <td>{{$row->fgp}}</td>
                <td>{{$row->fg}}</td>
                <td>{{$row->cgp}}</td>
                <td>{{$row->cg}}</td>
              @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              @endif  
              <td>{{$row->result}}</td>
         </tr>
        @endforeach	 
     </tbody>
  </table>
  </div>


     {!! csrf_field() !!}
      <div class="mt-4 my-3 mx-0">
              <button type="submit" id="edit_employee_btn" class="btn btn-success">Update </button>
              <br><br>
       </div>  
 </form>

  <script>  
   $(document).ready(function(){  
       $('#employee_data').DataTable({
             "order": [[ 1, "asc" ]] ,
	    	"lengthMenu": [[15, 50, 100, -1], [15, 50, 100, "All"]]
      }
	  );  
  });  
 </script> 


 <!-- Modal  Edit -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Result Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('Nin/Na/resulttype')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

             <b> For Half Yearly Examination and Model Test Please Select Result Type One .
	            	For Annual Examination ,Please Select Result Type Two . </b>

           <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>

           <div class="form-group col-sm-12  my-2">
               <label class=""><b>Result Type<span style="color:red;"> * </span></b></label>
                  <select class="form-select" name="type" id="exam"  aria-label="Default select example" required>
                      <option value="">Select Type</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                  </select>
           </div>

      </div>     
      <input type="submit"   id="insert" value="Submit" class="btn btn-success mx-3 mt-3" />
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



  
	
	

   

                  


@endsection     