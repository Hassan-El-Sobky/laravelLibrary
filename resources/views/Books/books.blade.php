@extends('layout')
 @section('title')
  All Categiores
 @endsection


 @section('content')
    <h1>All Books</h1>
     <!-- <form action="{{url('search/cat')}}" method="get">
         
     <input type="text" name="keyword" >
     <br>
       <button type="submit">Search</button>
     </form> -->
    <a href="{{url('create/book')}}">Add new Book</a>
     @foreach($books as $book)
       <a href="{{url('books',$book->id)}}">
           <h3>{{$book->id}}-{{$book->name}}</h3>

       </a>
       
      
         <p>{{$book->desc}}</p>

          <img class="img-fluid" width="400px" src='{{asset("uploads/$book->img")}}' alt="">
        
      

   
     @endforeach
      {{$books->links()}}
@endsection

