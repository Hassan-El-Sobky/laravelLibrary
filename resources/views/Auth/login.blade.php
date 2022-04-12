@extends('layout')
 
 
@section('title')
 Login
@endsection
 
 
@section('content')
 @include('errors')
 
 @if(request()->session()->has('errorMessage'))
 <div class="alert alert-success">
     <p>{{request()->session()->get('errorMessage')}}</p>
      
 </div>
 @endif
 <form action="{{url('login')}}" method="post">
     @csrf
     <input type="text" name="email" >
     <br>
     <input type="password" name="password" >
     <br>
     <button type="submit">Login</button>
 </form>
 
@endsection
