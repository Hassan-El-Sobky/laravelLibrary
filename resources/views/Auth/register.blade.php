@extends('layout')
 
 
@section('title')
 Login
@endsection
 
 
@section('content')
 @include('errors')
 
 <form action="{{url('register')}}" method="post">
     @csrf
 <input type="text" name="name" placeholder="name" >
 <br>
     <input type="text" name="email"  placeholder="email">
     <br>
     <input type="password" name="password" placeholder="password" >
     <br>
      <input type="password" name="password_confirmation" placeholder="confirm password" id="">
     <br>
     <button type="submit">Register</button>
 </form>
 
@endsection
