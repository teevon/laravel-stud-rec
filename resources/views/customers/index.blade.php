@extends('layout')

@section('title')
  Customer List
@endsection

@section('content')
<h2>No Blade</h2>
<ul>
 <?php
  foreach ($customers as $customer) {
      echo '<li>Hello ' . $customer->name .'</li>';
  }
  ?>
</ul>

<div class="row">
  <div class="col-12">
    <h2>Customer List "Using Blade"</h2>
    <p><a href="/customers/create">Add New Customer</a></p>
  </div>
</div>

  @foreach($customers as $customer)
  <div class="row">
    <div class="col-2">
      {{ $customer->id}}
    </div>
    <div class="col-4"> 
      <a href="/customers/{{ $customer->id }}"> {{ $customer->name }} </a> 
    </div>
    <div class="col-4"> {{ $customer->company->name }}</div>
    <div class="col-2"> {{ $customer->active }}</div>
  </div>
  @endforeach

@endsection