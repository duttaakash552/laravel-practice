@extends('assets.layouts')
@section('title', 'Laravel Details')
@section('content')
<h2>Welcome {{ Auth::User()->name }}</h2>
<a href="{{ route('logout') }}">Logout</a>
<h2>{{ $post->title }}</h2>
<p>{{ $post->description }}</p>
@endsection