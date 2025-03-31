@extends('assets.layouts')
@section('title', 'Laravel Dashboard')
@section('content')
<h2>Welcome {{ Auth::User()->name }}</h2>
<a href="{{ route('logout') }}">Logout</a>
@if(Session::has('success'))
	<div>
	{{ Session::get('success') }}
	</div>
@endif
<form method="post" action="{{ route('submit.post') }}" enctype="multipart/form-data">
@csrf
<div>
<label>Post Title:</label>
<input type="text" name="title" required />
</div>
<div>
<label>Post Description:</label>
<textarea name="description" required></textarea>
</div>
<div>
<label>Image:</label>
<input type="file" name="file" required />
</div>
<input type="submit" value="Post" />
</form>
<table>
<tr>
<td>Title</td>
<td>Description</td>
<td>Action</td>
</tr>
@foreach($posts as $post)
<tr>
<td>{{ $post->title }}</td>
<td>{{ $post->description }}</td>
<td>
<a href="{{ route('delete.post', $post->id) }}">Delete</a>
<a href="{{ route('show.post', $post->id) }}">Show</a>
</td>
</tr>
@endforeach
</table>
@endsection