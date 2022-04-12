@if($errors->any())
<div class="alert alert-danger">

  <ul>
   @foreach($errors->all() as $err)
  <li>{{$err}}</li>
  @endforeach
  </ul>
</div>

@endif