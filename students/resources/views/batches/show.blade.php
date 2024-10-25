@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Batches Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $batch->name }}</h5>
        <p class="card-text">Course_id : {{ $batch->course->name }}</p>
        <p class="card-text">Start_date : {{ $batch->start_date }}</p>
  </div>
       
    </hr>
  
  </div>
</div>