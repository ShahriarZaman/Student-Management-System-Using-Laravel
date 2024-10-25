@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Payments</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">enrollment_id : {{ $payments->enrollment?->enroll_no }}</h5>
        <p class="card-text">paid_date : {{ $payments->paid_date }}</p>
        <p class="card-text">amount : {{ $payments->amount }}</p>
  </div>
       
    </hr>
  
  </div>
</div>