<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Post;

use Auth;

class PostController extends Controller
{
    public function index()
	{
		$id = Auth::User()->id;
		$user = User::find($id);
		$posts = $user->posts;
		return view('dashboard', compact('posts'));
	}
	
	public function submit(Request $request)
	{
		$id = Auth::User()->id;
		
		$data = array(
			'user_id' => $id,
			'title' => $request->title,
			'description' => $request->description,
			'created_at' => NOW(),
			'updated_at' => NOW()
		);
		
		Post::create($data);
		
		return redirect()->back()->with('success', 'Post Submitted');
	}
	
	public function delete_post($id)
	{
		$model = Post::find($id);
		$model->delete();
		return redirect()->back()->with('success', 'Post deleted');
	}
	
	public function show_post($id)
	{
		$post = Post::findOrFail($id);
		return view('details', compact('post'));
	}
}
