@extends('layout')

@section('title')
  Show
@endsection


@section('content')

   <h3>Book</h3> 
   <h5> <a href="{{url('cats',$book->cat->id)}}">Category :{{$book->cat->name}}</a> </h5>
   <h4>{{$book->name}}</h4>
   <p>{{$book->desc}}</p>
   <img src='{{asset("uploads/$book->img")}}' width="400px" alt="">
   <br>
   <a href="{{url('books')}}">back</a>

   @endsection

