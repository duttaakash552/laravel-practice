@extends('assets.layouts')
@section('title', 'Laravel Customer Registration')
@section('content')
@if(Session::has('success'))
	<div>{{ Session::get('success') }}</div>
@endif
<form method="post" action="{{ route('customer.home') }}">
@csrf
<div>
<label>Name:</label>
<input type="text" name="name" />
@error('name')
	<div style="color: red">{{ $message }}</div>
@enderror
</div>
<div>
<label>Email:</label>
<input type="email" name="email" />
@error('email')
	<div style="color: red">{{ $message }}</div>
@enderror
</div>
<div>
<label>Password:</label>
<input type="password" name="password" />
@error('password')
	<div style="color: red">{{ $message }}</div>
@enderror
</div>
<input type="submit" value="Register" />
</form>
<p>Already have an account? <a href="{{ route('customer.login') }}">Signin</a></p>
@endsection