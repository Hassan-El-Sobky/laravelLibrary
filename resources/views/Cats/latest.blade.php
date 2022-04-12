@extends('layout')
   @section('title') 
 
Latest Categiores
   @endsection
@section('content')

<h2>Latest {{$num}} Categiores </h2>

   @foreach($cats as $cat)
       <h3>{{$cat->name}}</h3>
       <p>{{$cat->desc}}</p>
       <hr>
   @endforeach
@endsection