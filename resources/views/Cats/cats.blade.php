@extends('layout')
 @section('title')
  All Categiores
 @endsection

@section('css-Section')

<link rel="stylesheet" href="{{asset('css/cat.css')}}">
@endsection

 @section('content')
    
  @if(request()->session()->has('welcomeMessage'))
 <div class="alert alert-dangers">
     <p>{{request()->session()->get('welcomeMessage')}}</p>
      
 </div>
 @endif
 {{Auth::user()->name}}
    <h1>All Categiores</h1>
     <form action="{{url('search/cat')}}" method="get">
         
     <input type="text" name="keyword" >
     <br>
       <button type="submit">Search</button>
     </form>
    <a href="{{url('create/cat')}}">Add new Category</a>
     @foreach($cats as $cat)
       <a href="{{url('cats',$cat->id)}}">
           <h3>{{$cat->id}}-{{$cat->name}}</h3>

       </a>
      
         <p>{{$cat->desc}}</p>

          <img class="img-fluid" src='{{asset("uploads/$cat->img")}}' alt="">
         <a href="{{url('edit/cat',$cat->id)}}">Edit</a>
      

         <form action="{{url('delete/cat',$cat->id)}}" method="post">
         @method('DELETE')
         @csrf
           <button type="submit">Delete</button>
        </form>
     @endforeach
      {{$cats->links()}}
@endsection

