@extends('school/schoolheader')
@section('vedioindex','active')
@section('content')

<h4 class="mt-4">Vedio Tutorial  </h4>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Total Vedio {{$data->count()}} </li>
                 </ol>

                  
        <div class="row">

        @foreach($data as $row)
            <div class="col-sm-6 ">
	       <div class="panel panel-default shadow">
	           <div class="panel-body">
                         <div class="text-center">
                     <iframe width="560" height="315" src="{{$row->vedio}}"
                    title="YouTube video player" frameborder="0" 
                     allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                     picture-in-picture; web-share" allowfullscreen></iframe>  
                     </div>
                        </div>   
                        <div class="text-center">    
		    <div class="panel-footer">{{$row->text1}}</div>
                     </div>
		  </div>
                  <br>
	    </div>
            @endforeach	   

           


         </div>


@endsection     