@extends('todoTasks.layout')

@section('content')

<div class="container">
     <!-- //validation errors here -->
     @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
     @endif


<h3>Let's Edit your TodoList</h3>

<form action="todoTasks/edit" method="POST">
@csrf
@method('put')
<div class="form-group">
  <label for=""></label>
  <input type="text" name="title" id="" class="form-control" value="{{$todoTask->title}}" placeholder="Task Name" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Anything you can see later</small>
</div>

<div class="form-group">
    <label for=""></label>
    <textarea class="form-control" name="Description" value="" id="exampleFormControlTextarea1" rows="3">{{$todoTask->Description}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary" value="Update">Update</button>
</form>

</div>

@endsection