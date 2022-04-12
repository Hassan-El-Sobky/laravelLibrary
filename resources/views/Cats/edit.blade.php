<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="{{url('update/cat',$cat->id)}}" method="post" enctype="multipart/form-data">
     @csrf
     
<input type="text" value="{{$cat->name}}" name="name" >
<br>
<textarea name="desc">

  {{$cat->desc}}
</textarea>
 <br>
  <input type="file" name="img" id="">
 <br>
 <button type="submit"> Add Category </button>
</form>
</body>
</html>