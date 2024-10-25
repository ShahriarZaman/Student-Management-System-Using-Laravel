@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Enrollments Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Enroll_no : {{ $enrollment->enroll_no }}</h5>
        <p class="card-text">Batch_id : {{ $enrollment->batch->name }}</p>
        <p class="card-text">Student_id : {{ $enrollment->student->name }}</p>
        <p class="card-text">Join_date : {{ $enrollment->join_date }}</p>
        <p class="card-text">Fee : {{ $enrollment->fee }}</p>
  </div>
       
    </hr>
  
  </div>
</div>