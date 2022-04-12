@extends('layout')
 @section('title')
  All Categiores
 @endsection

@section('css-Section')

<link rel="stylesheet" href="{{asset('css/cat.css')}}">
@endsection

 @section('content')
    


    <h1>All Users</h1>
 
    
     @foreach($users as $user)
     
     
       <h5>{{$user->name}}--{{$user->email}}</h5>
        <p>{{$user->role}}</p>

          
      
     @endforeach
   
@endsection

