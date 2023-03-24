@extends('admin/dashboardheader')
@section('content')

                        <h4 class="mt-4">Student Import</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Student Import</li>
                        </ol>
             <b>Export Import Order </b>
            <p> 'stu_id'=>$row[0],
            'eiin'=>$row[1],
            'roll'=>$row[2],
            'name'=>$row[3],
            'class'=>$row[4],
            'babu'=>$row[5],
            'section'=>$row[6],
            'moral'=>$row[7],
            'main'=>$row[8],
            'addi'=>$row[9],
            'father'=>$row[10],
            'mother'=>$row[11],
            'phone'=>$row[12],
            'address'=>$row[13],
            'image'=>$row[14],<span class="text-danger" > Nb Export Birth Date But Not Import</span>
           </p>
                     
                     
        <div class="row">
         @if(session('status'))
         <h5 class="alert alert-success">{{ session('status')}} </h5>
                @endif
               <div class="col-sm-6">
             <form action="{{url('/admin/imports')}}" method="post" enctype="multipart/form-data">
           @csrf
       
       <input type="file" name="file" class="form-control" required><br>
       <input type="submit" class="btn btn-success" value="Import Data" ><br>
       </form>
       
       </div>
               <div class="col-sm-6">
            
                </div>		 
          </div> 

 



@endsection