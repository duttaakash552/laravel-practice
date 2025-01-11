@extends('assets.layouts')
@section('title', 'Laravel Registration')
@section('content')
@if(Session::has('success'))
	<div>{{ Session::get('success') }}</div>
@endif
<form method="post" action="{{ route('register') }}">
@csrf
<div>
<label>Name:</label>
<input type="text" name="name" />
@error('name')
	<div style="color: red;">{{ $message }}</div>
@enderror
</div>
<div>
<label>Email:</label>
<input type="email" name="email" />
@error('email')
	<div style="color: red;">{{ $message }}</div>
@enderror
</div>
<div>
<label>Password:</label>
<input type="password" name="password" />
@error('password')
	<div style="color: red;">{{ $message }}</div>
@enderror
</div>
<input type="submit" value="Register" />
</form>
<p>Already have an account? <a href="{{ route('login') }}">Signin</a></p>
<p>Want to join as a customer? <a href="{{ route('customer.home') }}">Signup</a></p>
@endsection