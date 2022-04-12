<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
 @include('errors')
<form action="{{url('store/book')}}" method="post" enctype="multipart/form-data">
     @csrf
<input type="text" name="name" >
<br>
<textarea name="desc" ></textarea>
 <br>
 <input type="file" name="img" >
 <br>
 <input type="number" name="price" >
 <br>
 
 <select name="cat_id" >  
     @foreach($cats as $cat)
     <option value="{{$cat->id}}">{{$cat->name}}</option>
     @endforeach
 </select>
 <button type="submit"> Add Book </button>
</form>
</body>
</html>