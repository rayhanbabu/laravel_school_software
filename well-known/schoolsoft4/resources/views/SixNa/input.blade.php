@extends('school/schoolheader')
@section('content')
      
   @include('SixNa/subject')
   
   <br><br>
   @if(Session::has('status'))
                   <div  class="alert alert-danger"> {{Session::get('status')}}</div>
                           @endif
                             </div>



@endsection     