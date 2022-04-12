@extends('layout')


@section('title')
  Search
@endsection

@section('content')
<form action="{{url('search/cat')}}" method="get">
         
         <input type="text" name="keyword" value="{{$keyword}}" >
         <br>
           <button type="submit">Search</button>
         </form>
<a href="{{url('cats')}}">Back to all Categiors</a>
@foreach($cats as $cat)

 <h2>{{$cat->name}}</h2>
 <p>{{$cat->desc}}</p>
@endforeach
@endsection