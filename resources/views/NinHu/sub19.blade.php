@extends('school/schoolheader')
@section('content')

@if(Session::has('school'))  
        @include('NinHu/subject') 
 @endif

     <h5 class="mt-2"> Class: {{$name->class}}, Group: {{$name->babu}}, Section: {{substr($tecodesection,10,1)}}, Subject: {{$name->subject}} </h5> 

 <div class="table-responsive">
  <form  method="POST" id="update_form" enctype="multipart/form-data">
   <table class="table table-bordered" style="font-size:15px;" >
     <thead>
     <tr style="background: whitesmoke;">

               <input type="hidden" name="tmark" value="{{$name->tmark}}"  class="form-control">
               <input type="hidden" name="cfail" value="{{$name->cfail}}"  class="form-control">
               <input type="hidden" name="mfail" value="{{$name->mfail}}"  class="form-control">
               <input type="hidden" name="pfail" value="{{$name->pfail}}"   class="form-control">
               <input type="hidden" name="subname" value="{{$name->subject}}"  class="form-control">
               <input type="hidden" name="subid" value="{{$name->subid}}"  class="form-control">
               <input type="hidden" name="subcode" value="{{$name->subcode}}"  class="form-control">
                  
                  <th width ="5%">Stu_ID</th>
                  <th width ="2%">Roll</th>
                  <th width ="15%"> Name of Student </th>	
                  @if($name->cstatus=='number')
                  <th width="7%"><span class="text-white"> .........</span>CQ</th>	
                  @else
                  <th width="7%"><span class="text-white"></th>
                  @endif  
                  @if($name->mstatus=='number')		   
                  <th width="7%"><span class="text-white"> ........</span>Mcq</th> 
                  @else
                  <th width="7%"><span class="text-white"></th>
                  @endif  
                  @if($name->pstatus=='number')	
                  <th width="7%"><span class="text-white"> ..</span>Practical</th>
                  @else
                  <th width="7%"><span class="text-white"></th>
                  @endif  
                  <th width="7%"> Total  </th> 
                  <th width="5%">Gpa </th> 
                  <th width="7%">Grade  </th> 				   
       
        </tr>
   </thead>
     <tbody>


     </tbody>
  </table>
  <div class="loader">
            <img src="{{ asset('images/abc.gif') }}" alt="" style="width: 50px;height:50px;">
          </div>


  <div class="mt-4 my-3 mx-3">
            <button type="submit" id="edit_employee_btn" class="btn btn-success">Update </button>
            <br><br>
       </div>  
 </form>
</div>

<script>  
$(document).ready(function(){  

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });
    
    fetch_data();

      function fetch_data() {
        $.ajax({
          type:'GET',
          url:'/NinHuSelect/{{$tecodesection}}',
          success: function(response) {
            //console.log(response);
            var html = '';
                for(var count = 0; count < response.data.length; count++)
                {
                    if(response.data[count].sub19c==0){ var subc=''; }else{
              var subc=response.data[count].sub19c; }

                    if(response.data[count].sub19m==0){ var subm=''; }else{
             var subm=response.data[count].sub19m; } 
                    
                    if(response.data[count].sub19p==0){ var subp=''; }else{
              var subp=response.data[count].sub19p; }
              

	 html += '<tr>';
   html += '<input type="hidden" id="'+response.data.length+'"  name="id[]" value="'+response.data[count].id+'" />';
   html += '<td>'+response.data[count].stu_id+'</td>';
   html += '<td>'+response.data[count].roll+'</td>';
   html += '<td>'+response.data[count].name+'</td>';
   html += '<td><input type="'+response.sstatus.cstatus+'"  min="0" max="'+response.sstatus.cmark+'" name="subc[]"   class="form-control" value="'+subc+'"/></td>';
   html += '<td><input type="'+response.sstatus.mstatus+'"  min="0" max="'+response.sstatus.mmark+'" name="subm[]"   class="form-control" value="'+subm+'" /></td>';
   html += '<td><input type="'+response.sstatus.pstatus+'"  min="0" max="'+response.sstatus.pmark+'" name="subp[]"   class="form-control" value="'+subp+'" /></td>';
   
   
   html += '<td>'+response.data[count].sub19t+'</td>';
   html += '<td>'+response.data[count].sub19gp+'</td>';
   html += '<td>'+response.data[count].sub19g+'</td>';
   html += '</tr>';
			
                }
                $('tbody').html(html);

          }
        });
      }
    
    
    
    
    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($(this).attr("id").length > 0)
        {
            $.ajax({
                url:"/Nin/Hu/sub_update",
                type:"POST",
                dataType: 'json',
                data:$(this).serialize(),
                beforeSend:function(){  
                   $('.loader').show();
                   $("#edit_employee_btn").prop('disabled', true)
                  }, 
                success:function(response)
                 {
               // console.log(response.data)
                if(response.status == 100){
                   Swal.fire("Updated",response.message,"success");
                   }
                 $("#edit_employee_btn").prop('disabled', false)  
                 $('.loader').hide();
                 fetch_data();
               }
            })
        }
    });

});  
</script> 

                  


@endsection     