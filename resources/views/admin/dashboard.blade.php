@extends('admin/dashboardheader')
@section('content')

                        <h4 class="mt-4">Dashboard</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       <p>Image Access  : <b>{!!$admin->image_access!!}</b><br>
                          SMS Access  :  <b>{!!$admin->sms_access!!}</b><br>
                          Finance Access  :  <b>{!!$admin->sms_access!!}</b><br>
                          Attendance Access  :  <b>{!!$admin->atten_access!!}</b><br>
                          Invoice create day   :  <b>{!!$admin->inv_access_day!!} Tarik</b><br>
                          Invoice Part    :  <b>{!!$admin->inv_part!!} Tarik</b><br>
                          Spend Access  :  <b>{!!$admin->spend_access!!}</b><br>

                          Section Description : <b>{!!$admin->section_des!!}</b>
                     </p>
                    
                    
                   

        <h4 class="mt-4">Current  Year View</h4>

 <div class="card-block table-border-style">                     
 <div class="table-responsive">
  <table class="table table-bordered" >
    <thead>
      <tr>
         
           <th width="10%" >Year</th>
           <th width="10%" >Phone </th>
           <th width="10%" >Password</th>
           <th width="5%" >Edit</th>
      </tr>
    </thead>
    <tbody>

	
	 <tr>
       
        <td>{{ $admin->year }}</td>
        <td>{{ $admin->school_phone }}</td>
        <td>{{ $admin->school_pass }}</td>
        
     <td>
      <button type="button" name="edit" data-exam="{{$admin->exam}}" data-year="{{$admin->year}}"  id="{{$admin->id}}" class="btn btn-success btn-sm edit" >Edit</button>
     </td>

	</tr>
 
	</tbody>
   </table>
</div>
</div>

<!-- Modal  Edit -->
<div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Exam, Year Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/yearupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>
         


          <div class="form-group col-sm-12  my-2">
               <label class=""><b>Year<span style="color:red;"> * </span></b></label>
               <select class="form-select" name="year" id="year"  aria-label="Default select example" required>
                       <option value="">Select</option>
                       @foreach($year as $row)
                       <option value="{{$row->text1}}">{{$row->text2}}</option>
                        @endforeach	 
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



<script type="text/javascript">

      $(document).ready(function(){

      $(document).on('click','.edit',function(){
             var edit_id = $(this).attr("id");
             var exam = $(this).data("exam"); 
             var year = $(this).data("year");   
             $('#editmodal').modal('show');
             $('#edit_id').val(edit_id)
             $('#exam').val(exam)
             $('#year').val(year)
      });

});
       
</script>



@endsection