@extends('maintain/dashboardheader')
@section('content')

<div class="row mt-4 mb-3">
               <div class="col-6"> <h4 class="mt-0">Admin View</h4></div>
                     <div class="col-3">
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                             <form action="{{url('maintain/adminpdf')}}" method="POST" enctype="multipart/form-data">
                                  {!! csrf_field() !!}
                                  <input type="hidden" name="invoice" class="form-control" value="invoice" required>
                                  <button type="submit" name="search" class="btn btn-primary">Admin pdf </button>
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
         <th width="10%" >Name</th>
         <th width="15%" >E-mail</th>
		     <th width="15%" >Mobile </th>
	       <th width="15%" >Username</th>
         <th width="15%" >Password</th>
         <th width="15%" >Role</th>
         <th width="5%" >Status</th>
         <th width="5%" >Edit</th>
         <th width="5%" >Delete</th>
      </tr>
  </thead>
  <tbody>

	@foreach($admin as $item)
	 <tr>
        <td>{{$item->name}}</span></td>
        <td>{{$item->email}}</td>
        <td>{{$item->mobile}}</td>
        <td>{{$item->admin_name}}</td>
        <td>{{$item->admin_password}}</td>
        <td>{{$item->role}}</td>

   <td>
   @if($item->status == 1)         
        <a href="{{ url('maintain/adminlist/deactive/'.$item->id) }}" class="btn btn-success btn-sm" >Active<a>     
        @else
        <a href="{{ url('maintain/adminlist/active/'.$item->id) }}" class="btn btn-danger btn-sm" >Deactive<a>       
        @endif
   </td>

    <td>
      <button type="button" name="edit" id="{{$item->id}}" class="btn btn-success btn-sm edit" 
	  	 data-name="{{$item->name}}" data-email="{{$item->email}}" data-admin_name="{{$item->admin_name}}"
        data-admin_password="{{$item->admin_password}}" data-role="{{$item->role}}" data-mobile="{{$item->mobile}}">Edit</button>
    </td>

        <td><a  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to milloff  this month?')"  href="{{ url('maintain/admindelete/'.$item->id)}}">Delete</a></td>

	</tr>
    @endforeach	 
	</tbody>
  </table>
</div>
</div>


   <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable({
        "order": [[ 0, "desc" ]] ,
		"lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]]
      }
	  );  
 });  
 </script>  
	</div>
</div>


<script type="text/javascript">
           $(document).ready(function(){
                $(document).on('click','.edit',function(){
                   var id = $(this).attr("id");  
                   var name = $(this).data("name");
                   var email = $(this).data("email");
                   var mobile = $(this).data("mobile");
                   var role = $(this).data("role");
                   var admin_name = $(this).data("admin_name");
                   var admin_password = $(this).data("admin_password");
                     $('#edit_name').val(name);
                     $('#edit_id').val(id);
                     $('#edit_email').val(email);
                     $('#edit_mobile').val(mobile);
                     $('#edit_admin_name').val(admin_name);
                     $('#edit_admin_password').val(admin_password);
                     $('#edit_role').val(role);
                     $('#updatemodal').modal('show');
                });

           });


</script>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Admin Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="post" action="{{url('maintain/admininsert')}}"  class="myform"  enctype="multipart/form-data" >
   {!! csrf_field() !!}
         <div class="form-group  my-2">
               <label class=""><b>Name</b></label>
               <input type="text" name="name" class="form-control" required>
          </div> 
			  
         <div class="form-group  my-2">
               <label class=""><b>E-mail</b></label>
               <input type="text" name="email" class="form-control" required>
          </div> 

          <div class="form-group  my-2">
               <label class=""><b>Mobile(880)</b></label>
               <input type="text" name="mobile" class="form-control" required>
          </div> 

          <div class="form-group  my-2">
               <label class=""><b>Username</b></label>
               <input type="text" name="admin_name" class="form-control" required>
          </div> 

          <div class="form-group  my-2">
               <label class=""><b>Password</b></label>
               <input type="text" name="admin_password" class="form-control" required>
          </div>

          
        <div class="form-group  mb-4">
        <label class=""><b>Role</b></label>
          <select class="form-select" name="role" aria-label="Default select example">
                 <option selected>Select One</option>
                 <option value="Admin">Admin</option>
                 <option value="User">User</option> 
           </select>
       </div>   

         
    <input type="submit"   id="insert" value="Submit" class="btn btn-success" />
	  
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Edit -->
<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Admin Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="post" action="{{url('maintain/adminedit')}}"  class="myform"  enctype="multipart/form-data" >
         {!! csrf_field() !!}

         <input type="hidden" id="edit_id" name="id" class="form-control">

         <div class="form-group  my-2">
               <label class=""><b>Name</b></label>
               <input type="text" id="edit_name" name="name" class="form-control" required>
         </div> 
			  
         <div class="form-group  my-2">
               <label class=""><b>E-mail</b></label>
               <input type="text" id="edit_email"  name="email" class="form-control" required>
          </div> 

        <div class="form-group  my-2">
               <label class=""><b>Mobile(880)</b></label>
               <input type="text" id="edit_mobile"  name="mobile" class="form-control" required>
        </div> 

          <div class="form-group  my-2">
               <label class=""><b>Username</b></label>
               <input type="text" id="edit_admin_name"  name="admin_name" class="form-control" required>
          </div> 

          <div class="form-group  my-2">
               <label class=""><b>Password</b></label>
               <input type="text" id="edit_admin_password"  name="admin_password" class="form-control" required>
          </div>

          
        <div class="form-group  mb-4">
        <label class=""><b>Role</b></label>
          <select class="form-select" id="edit_role"  name="role" aria-label="Default select example">
                 <option selected>Select One</option>
                 <option value="Admin">Admin</option>
                 <option value="User">User</option> 
           </select>
       </div>   

    <input type="submit"   id="insert" value="Update" class="btn btn-success" />
	  
              
   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





   
   
     


@endsection