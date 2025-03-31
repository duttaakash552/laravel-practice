@extends('assets.layouts')
@section('title', 'Laravel Details')
@section('content')
<h2>Welcome {{ Auth::User()->name }}</h2>
<a href="{{ route('logout') }}">Logout</a>
<div>
	<h2>{{ $post->title }}</h2>
	<p>{{ $post->description }}</p>
</div>
<div>
	<p>Post comment:</p>
	@if(Session::has('success'))
		<div style="color: green">{{ Session::get('success') }}</div>
	@endif
	<form method="post" action="{{ route('submit.comment') }}">
		@csrf
		<input type="hidden" name="post_id" value="{{ $id }}">
		<textarea name="comment" style="display: block"></textarea>
		<br>
		<input type="submit" />
	</form>
</div>
<div>
	<h2>Comment List:</h2>
	<?php foreach($post->commentss as $comment) { ?>
		<p><?= $comment->comment; ?></p>
	<?php } ?>
</div>
@endsection