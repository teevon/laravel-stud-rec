@extends('layout')

@section('title', 'Customer New')

@section('content')
<div>
 <div class="row">
     <div class="col-12">
       <h1>New Customer</h1>
     </div>
 </div>
  <div class="row">
    <div class="col-12">
    <form action='/customers' method="post">
    <div class=form-group>
    <label for="title">Title: </label>
      <input type='text' placeholder="" name="title" value="{{ old('title') }}" class="form-control">
      {{ $errors->first('title')}} 
    </div>

    <div class=form-group>
      <label for="name">Name:</label>
      <input type='text' placeholder="" name="name" value="{{ old('name') }}" class="form-control">
      {{ $errors->first('name')}} 
    </div>

    <div class=form-group>
      <label for="email">Email:</label>
      <input type='text' placeholder="" name="email" value="{{ old('email') }}" class="form-control">
      {{ $errors->first('email')}} 
    </div>

    <div class="form-group">
      <label for='active'>Status</label>
      <select name="active" id="active" class="form-control">
      <option value="" disabled>Select Customer Status</option>
      <option value="1">Active</option>
      <option value="0">Inactive</option>
      </select>
      {{ $errors->first('active')}} 
    </div>

    <div class="form-group">
    <label for='company_id'>Company</label>
      <select name="company_id" id="company_id" class="form-control">
      @foreach ($companies as $company)
        <option value='{{$company->id}}'> {{$company->name}} </option>
      @endforeach
      </select> 
    </div>

    <button type="submit" class="btn btn-primary">Add Customer</button>
    @csrf
  </form>
    </div>
  </div>
</div>
@endsection