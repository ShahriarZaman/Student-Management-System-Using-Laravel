@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Payments Page</div>
  <div class="card-body">
      
      <form action="{{ url('payments') }}" method="post">
        @csrf
        <label>enrollment_id</label></br>
        <!--<input type="text" name="enrollment_id" id="enrollment_id" class="form-control"></br>-->
        <select name="enrollment_id" id="enrollment_id" class="form-control">
          @foreach($enrollments as $id=> $enroll_no)
          <option value="{{$id}}">{{$enroll_no}}</option>
          @endforeach
        </select>


        <label>paid_date</label></br>
        <input type="text" name="paid_date" id="paid_date" class="form-control"></br>
        <label>amount</label></br>
        <input type="text" name="amount" id="amount" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop