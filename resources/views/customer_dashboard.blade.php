@extends('assets.layouts')
@section('title', 'Laravel Customer Dashboard')
@section('content')
<h2>Welcome {{ Auth::guard('customer')->user()->name }}</h2>
<a href="{{ route('customer.logout') }}">Logout</a>
@endsection