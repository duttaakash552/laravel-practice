@extends('assets.layouts')
@section('title', 'Laravel Customer Login')
@section('content')
@if(Session::has('success'))
	<div>{{ Session::get('success') }}</div>
@endif
<form method="post" action="{{ route('customer.login') }}">
@csrf
<div>
<label>Email:</label>
<input type="email" name="email" />
@error('email')
	<div style="color:red">{{ $message }}</div>
@enderror
</div>
<div>
<label>Password:</label>
<input type="password" name="password" />
@error('password')
<div style="color:red">{{ $message }}</div>
@enderror
</div>
<input type="submit" value="Login" />
</form>
<p>Don't have an account? <a href="{{ route('customer.home') }}">Signup</a></p>
@endsection