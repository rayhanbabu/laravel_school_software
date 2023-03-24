@extends('admin/dashboardheader')
@section('content')

  <div class="row mt-4 mb-0">
               <div class="col-3"> <h4 class="mt-0"> Subject Info:  {{$class}} , {{$babu}}</h4></div>
                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                          <form method="post" action="{{url('admin/subimport')}}"  class="myform"  enctype="multipart/form-data" >
                             {!! csrf_field() !!}
                             <input type="hidden" name="class" class="form-control" value="{{$class}}">
                             <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
                             <input type="number" name="eiin" class="form-control" placeholder="Choice  EIIN No" required>
                             <input type="submit"   id="insert" value="Import Database" class="btn btn-success mx-3 mt-2"/>
                         </form>  
                      </div>
                     </div>

                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                          <form method="post" action="{{url('admin/importexcel')}}"  class="myform"  enctype="multipart/form-data" >
                             {!! csrf_field() !!}
                             <input type="hidden" name="class" class="form-control" value="{{$class}}">
                             <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
                             <input type="hidden" name="eiin" class="form-control" value="{{Session::get('admin')->eiin}}">
                             <input type="file" name="file" class="form-control">
                             <input type="submit"   id="insert" onclick="return confirm('Excel 1st 16 row must be exist some value empty value replace 0 value')" value="Import Excel" class="btn btn-success mx-3 mt-2"/>
                         </form>  
                      </div>
                     </div>

                     <div class="col-2">
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end "> 
                          <form method="post" action="{{url('admin/subexport')}}"  class="myform"  enctype="multipart/form-data" >
                             {!! csrf_field() !!}
                             <input type="hidden" name="class" class="form-control" value="{{$class}}">
                             <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
                             <input type="hidden" name="eiin" class="form-control" value="{{Session::get('admin')->eiin}}">
                             <input type="submit"   id="insert" value="Export CSV" class="btn btn-success mx-3 mt-2"/>
                         </form>  
                      </div>
                     </div>

                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex ">
                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Add
                        </button>
                      
                         </div>
                     </div> 
             </div>  
             <ol class="breadcrumb">
                  <li class="breadcrumb-item active">/Subject Info</li>
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
           <th width="5%" >Subject Id</th>
		 <th width="5%" >Subject Code</th>
	      <th width="10%" >Teacher Code</th>
           <th width="5%" >Class</th>
           <th width="5%" >Group</th>
           <th width="10%" >Subject</th>
           <th width="5%" >Total Mark</th>
           <th width="5%" >CQ,MCQ, Pra status</th>
           <th width="5%" >CQ,MCQ, Pra Mark</th>
           <th width="5%" >CQ,MCQ, Pra Fail</th>
           <th width="5%" >Edit</th>
           <th width="5%" >Delete</th>
      </tr>
    </thead>
    <tbody>

	@foreach($subject as $row)
	 <tr>
        <td>{{$row->eiin}}</td>
        <td>{{$row->subid}}</td>
        <td>{{$row->subcode}}</td>
        <td>{{$row->tecode}}</td>
        <td>{{$row->class}}</td>
        <td>{{$row->babu}}</td>
        <td>{{$row->subject}}</td>
        <td>{{$row->tmark}}</td>
        <td>{{$row->cstatus}}, {{$row->mstatus}}, {{$row->pstatus}}</td>
        <td>{{$row->cmark}}, {{$row->mmark}}, {{$row->pmark}}</td>
        <td>{{$row->cfail}}, {{$row->mfail}}, {{$row->pfail}}</td>

     <td>
      <button type="button" name="edit" id="{{$row->id}}" class="btn btn-success btn-sm edit" >Edit</button>
     </td>

     <td><a  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete  this row?')"  href="{{ url('admin/subjectdelete/'.$row->id)}}">Delete</a></td>

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



<!-- Modal  ADD  -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subject Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/subjectinsert')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

          <input type="hidden" name="eiin" class="form-control" value="{{$admin->eiin}}" required>

         <div class="form-group col-sm-6  my-2">
               <label class=""><b>Subject ID<span style="color:red;"> * </span></b></label>
               <input type="number" name="subid" class="form-control" required>
          </div> 
			

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Subject Code</b></label>
               <select class="form-select" name="subcode"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="sub11">sub11</option>
                     <option value="sub12">sub12</option>
                     <option value="sub13">sub13</option>
                     <option value="sub14">sub14</option>
                     <option value="sub15">sub15</option>
                     <option value="sub16">sub16</option>
                     <option value="sub17">sub17</option>
                     <option value="sub18">sub18</option>
                     <option value="sub19">sub19</option>
                     <option value="sub20">sub20</option>
                     <option value="sub21">sub21</option>
                     <option value="sub22">sub22</option>
                     <option value="sub23">sub23</option>
                     <option value="sub24">sub24</option>        
           </select>
          </div>

         
          <input type="hidden" name="class" class="form-control" value="{{$class}}">
          <input type="hidden" name="babu" class="form-control" value="{{$babu}}">
              
     

          <div class="form-group col-sm-8 my-2">
               <label class=""><b>Subject</b></label>
               <input type="text" name="subject" class="form-control" required>
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>Total Marks</b></label>
               <input type="number" name="tmark" class="form-control" >
          </div> 


          <div class="form-group col-sm-4  my-2">
               <label class=""><b>CQ Status</b></label>
               <select class="form-select" name="cstatus"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="number">number</option>
                     <option value="hidden">hidden</option>
           </select>
          </div>

           <div class="form-group col-sm-4  my-2">
             <label class=""><b>MCQ Status</b></label>
               <select class="form-select" name="mstatus"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="number">number</option>
                     <option value="hidden">hidden</option>
             </select>
          </div>

          <div class="form-group col-sm-4  my-2">
             <label class=""><b>Pra Status</b></label>
               <select class="form-select" name="pstatus"  aria-label="Default select example" required>
                       <option value="">Select</option>
                      <option value="number">number</option>
                      <option value="hidden">hidden</option>
             </select>
          </div>


          <div class="form-group col-sm-4 my-2">
               <label class=""><b>CQ Marks</b></label>
               <input type="number" name="cmark" class="form-control">
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>MCQ Marks</b></label>
               <input type="number" name="mmark" class="form-control">
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>Par Marks</b></label>
              <input type="number" name="pmark" class="form-control">
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>CQ Fail</b></label>
               <input type="number" name="cfail" class="form-control">
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>MCQ Fail</b></label>
               <input type="number" name="mfail" class="form-control">
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>Par Fail</b></label>
               <input type="number" name="pfail" class="form-control" >
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




 <!-- Modal  Edit -->
 <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Subject Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="post" action="{{url('admin/subjectupdate')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}

   <div class="row px-3">

               <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>

         <div class="form-group col-sm-6  my-2">
               <label class=""><b>Subject ID<span style="color:red;"> * </span></b></label>
               <input type="number" name="subid" id="edit_subid" class="form-control" required>
          </div> 
			

          <div class="form-group col-sm-6  my-2">
               <label class=""><b>Subject Code</b></label>
               <select class="form-select" name="subcode" id="edit_subcode"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="sub11">sub11</option>
                     <option value="sub12">sub12</option>
                     <option value="sub13">sub13</option>
                     <option value="sub14">sub14</option>
                     <option value="sub15">sub15</option>
                     <option value="sub16">sub16</option>
                     <option value="sub17">sub17</option>
                     <option value="sub18">sub18</option>
                     <option value="sub19">sub19</option>
                     <option value="sub20">sub20</option>
                     <option value="sub21">sub21</option>
                     <option value="sub22">sub22</option>
                     <option value="sub23">sub23</option>
                     <option value="sub24">sub24</option>
                    
           </select>
          </div>


          <input type="hidden" name="class" class="form-control" value="{{$class}}">

          <input type="hidden" name="babu" class="form-control" value="{{$babu}}">

         

          <div class="form-group col-sm-8 my-2">
               <label class=""><b>Subject</b></label>
               <input type="text" name="subject" id="edit_subject" class="form-control" required>
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>Total Marks</b></label>
               <input type="number" name="tmark" id="edit_tmark" class="form-control" >
          </div> 


          <div class="form-group col-sm-4  my-2">
               <label class=""><b>CQ Status</b></label>
               <select class="form-select" name="cstatus" id="edit_cstatus"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="number">number</option>
                     <option value="hidden">hidden</option>
           </select>
          </div>

           <div class="form-group col-sm-4  my-2">
             <label class=""><b>MCQ Status</b></label>
               <select class="form-select" name="mstatus" id="edit_mstatus"  aria-label="Default select example" required>
                     <option value="">Select</option>
                     <option value="number">number</option>
                     <option value="hidden">hidden</option>
             </select>
          </div>

          <div class="form-group col-sm-4  my-2">
             <label class=""><b>Pra Status</b></label>
               <select class="form-select" name="pstatus" id="edit_pstatus"  aria-label="Default select example" required>
                       <option value="">Select</option>
                      <option value="number">number</option>
                      <option value="hidden">hidden</option>
             </select>
          </div>

         

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>CQ Marks</b></label>
               <input type="number" name="cmark" id="edit_cmark" class="form-control" >
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>MCQ Marks</b></label>
               <input type="number" name="mmark" id="edit_mmark" class="form-control" >
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>Par Marks</b></label>
               <input type="number" name="pmark" id="edit_pmark" class="form-control" >
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>CQ Fail</b></label>
               <input type="number" name="cfail" id="edit_cfail" class="form-control" >
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>MCQ Fail</b></label>
               <input type="number" name="mfail" id="edit_mfail" class="form-control" >
          </div> 

          <div class="form-group col-sm-4 my-2">
               <label class=""><b>Par Fail</b></label>
               <input type="number" name="pfail" id="edit_pfail" class="form-control" >
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
             $('#editmodal').modal('show');
             $.ajax({
             type:'GET',
             url:'/admin/subjectview/'+edit_id,
             success:function(response){        
               // console.log(response.subject)
               $('#edit_id').val(response.subject.id)
               $('#edit_subid').val(response.subject.subid)
               $('#edit_subcode').val(response.subject.subcode)
               $('#edit_class').val(response.subject.class)
               $('#edit_babu').val(response.subject.babu)
               $('#edit_subject').val(response.subject.subject)
               $('#edit_tmark').val(response.subject.tmark)
               $('#edit_cstatus').val(response.subject.cstatus)
               $('#edit_mstatus').val(response.subject.mstatus)
               $('#edit_pstatus').val(response.subject.pstatus)
               $('#edit_cmark').val(response.subject.cmark)
               $('#edit_mmark').val(response.subject.mmark)
               $('#edit_pmark').val(response.subject.pmark)
               $('#edit_cfail').val(response.subject.cfail)
               $('#edit_mfail').val(response.subject.mfail)
               $('#edit_pfail').val(response.subject.pfail)
            
                }
             }); 
      });

});
       
</script>
@endsection