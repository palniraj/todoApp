@extends('todoTasks.layout')

@section('content')
<div class="container">
<h3>Let's Create your TodoList</h3>

<form action="todoTasks/create" method="POST">
@csrf
<div class="form-group">
  <label for=""></label>
  <input type="text" name="title" id="" class="form-control" placeholder="Task Name" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Anything you can see later</small>
</div>

<div class="form-group">
    <label for=""></label>
    <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" placeholder="Description" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary" value="Save">Save</button>
</form>
</div>
@endsection