@extends('school/schoolheader')
@section('colorview','active')
@section('content')
<div class="row mt-4 mb-0">
               <div class="col-3"> <h4 class="mt-0"> Color View</h4></div>
                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                         
                      </div>
                     </div>

                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                        
                      </div>
                     </div>

                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                         
                      </div>
                     </div>

                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex ">
                        
                         </div>
                     </div> 
             </div>  
             <ol class="breadcrumb">
                  <li class="breadcrumb-item active">/color view</li>
             </ol>
             
@if ($errors->any())
      <div class="alert alert-danger">
         <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
             @endforeach
         </ul>
      </div>
@endif
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
           <th width="10%" >Admit text, Border </th>
           <th width="10%" >SeatPlan text, Border </th>
           <th width="10%" >MarksInput Form text, Border </th>
           <th width="10%" >Marksheet text, Border </th>
           <th width="10%" >Tabulationsheet text, Border </th>
           <th width="10%" >Summary text, Border </th>
           <th width="10%" >Testimonial text, Border </th>
		
           <th width="5%" >Edit</th>
          
      </tr>
    </thead>
    <tbody>

	@foreach($color as $row)
	 <tr>
        <td>{{$row->eiin}}</td>
        <td>{{$row->color1}} , {{$row->color2}}, {{$row->color21}}</td>
        <td>{{$row->color3}} , {{$row->color4}}, {{$row->color22}}</td>
        <td>{{$row->color5}} , {{$row->color6}}</td>
        <td>{{$row->color7}} , {{$row->color8}}</td>
        <td>{{$row->color9}} , {{$row->color10}}</td>
        <td>{{$row->color11}} , {{$row->color12}}</td>
        <td>{{$row->color13}} , {{$row->color14}}</td>
     <td>
      <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm edit" >Edit</button>
     </td>

     
	</tr>
    @endforeach	 
	</tbody>
   </table>

  <script>  
  $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "asc" ]] ,
	   "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]]
      }
	  );  
  });  
 </script>  
</div>
</div>


 <!-- Modal  Edit -->
 <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Color Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
 <form method="post" action="{{url('colorupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

           <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>

          <p> <a target="_blank" href="https://www.w3schools.com/colors/colors_picker.asp"> Show Color page </a></p>

          <label class=""><b>Admit Text Color Ex. <span style="color:red;">41, 41, 61 </span></b></label>
         <div class="form-group col-sm-4  my-2">
               <input type="number" name="color1" id="edit_color1" class="form-control" required>
          </div>
          <div class="form-group col-sm-4  my-2">
               <input type="number" name="color2" id="edit_color2"   class="form-control" required>
          </div> 

          <div class="form-group col-sm-4  my-2">
              
              <input type="number" name="color21" id="edit_color21"  class="form-control" required>
         </div>

          <label class=""><b>SeatPlan Text Color Ex. <span style="color:red;">41, 41, 61 </span></b></label>
          <div class="form-group col-sm-4  my-2">
             
               <input type="number" name="color3" id="edit_color3"  class="form-control" required>
          </div> 
          <div class="form-group col-sm-4  my-2">
              
               <input type="number" name="color4" id="edit_color4"  class="form-control" required>
          </div>

          <div class="form-group col-sm-4  my-2">
              
               <input type="number" name="color22" id="edit_color22"  class="form-control" required>
          </div>
          
          
          
          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Marks Input Form Text Color Ex. <span style="color:red;"> #0d0d0d </span></b></label>
               <input type="text" name="color5" id="edit_color5"  class="form-control" required>
          </div> 
          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Marks Input Form Border Color Ex. <span style="color:red;"> #706666</span></b></label>
               <input type="text" name="color6" id="edit_color6"  class="form-control" required>
          </div> 


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Markseet Text Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color7" id="edit_color7"  class="form-control" required>
          </div> 
          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Markseet Border Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color8" id="edit_color8"  class="form-control" required>
          </div> 


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Tabulationsheet Text Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color9" id="edit_color9"  class="form-control" required>
          </div> 
          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Tabulationsheet Border Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color10" id="edit_color10"  class="form-control" required>
          </div> 


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Summary Text Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color11" id="edit_color11"  class="form-control" required>
          </div> 
          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Summary Border Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color12" id="edit_color12"  class="form-control" required>
          </div> 


          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Testimonial Text Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color13"  id="edit_color13"  class="form-control" required>
          </div> 
          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Testimonial Border Color<span style="color:red;"> * </span></b></label>
               <input type="text" name="color14" id="edit_color14"  class="form-control" required>
          </div> 

       
         
      </div>     
      <input type="submit"   id="insert" value="Update" class="btn btn-success mx-3 mt-3" />
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">

      $(document).ready(function(){

      $(document).on('click','.edit',function(){
             var edit_id = $(this).attr("id");  
             $('#editmodal').modal('show');
             $.ajax({
             type:'GET',
             url:'/colorview/'+edit_id,
             success:function(response){        
               // console.log(response.subject)
               $('#edit_id').val(response.color.id)
               $('#edit_color1').val(response.color.color1)
               $('#edit_color2').val(response.color.color2)
               $('#edit_color3').val(response.color.color3)
               $('#edit_color4').val(response.color.color4)
               $('#edit_color5').val(response.color.color5)
               $('#edit_color6').val(response.color.color6)
               $('#edit_color7').val(response.color.color7)
               $('#edit_color8').val(response.color.color8)
               $('#edit_color9').val(response.color.color9)
               $('#edit_color10').val(response.color.color10)
               $('#edit_color11').val(response.color.color11)
               $('#edit_color12').val(response.color.color12)
               $('#edit_color13').val(response.color.color13)
               $('#edit_color14').val(response.color.color14)
               $('#edit_color21').val(response.color.color21)
               $('#edit_color22').val(response.color.color22)
              
            
                }
             }); 
      });

});
       
</script>


@endsection