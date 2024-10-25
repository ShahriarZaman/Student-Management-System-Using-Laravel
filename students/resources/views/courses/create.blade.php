@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Courses Page</div>
  <div class="card-body">
      
      <form action="{{ url('courses') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Course</label></br>
        <input type="text" name="course" id="course" class="form-control"></br>
        <label>Duration</label></br>
        <input type="text" name="duration" id="duration" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop