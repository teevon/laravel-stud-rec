@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
 <h1>Contact Us Here</h1>

@if( !session()->has('message'))
 <form action="{{route('contact.store')}}" method="post">
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

    <div class=form-group>
      <label for="message">Message</label>
      <textarea name="message" id="message" cols="30" rows="10" class="form-control">
      {{ old('message') }}
      </textarea>
      {{ $errors->first('message')}} 
    </div>

    @csrf

    <button type="submit" class="btn btn-primary">Send Message</button>
 </form>
 @endif
 @endsection