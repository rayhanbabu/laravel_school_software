@extends('school/schoolheader')
@section('content')
      
   @include('TenSc/subject')
   
   <br><br>
   @if(Session::has('status'))
                   <div  class="alert alert-danger"> {{Session::get('status')}}</div>
                           @endif
                             </div>



@endsection     