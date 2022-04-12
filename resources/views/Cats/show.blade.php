@extends('layout')

@section('title')
  Show
@endsection


@section('content')

   <h3>Category</h3> 

   <h4>{{$cat->name}}</h4>
   <p>{{$cat->desc}}</p>

   <a href="{{url('cats')}}">back</a>
   <h5> All Books</h5>
   <ul>
    @foreach($cat->books as $book)
    
   <li>{{$book->name}}</li>
    @endforeach
    </ul>
   @endsection

