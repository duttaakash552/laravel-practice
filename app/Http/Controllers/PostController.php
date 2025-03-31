<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Post;

use Auth;

use DB;

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
		$request->validate([
			'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
		]);

		$id = Auth::id(); // Shorter version of Auth::User()->id

		DB::beginTransaction();
		try {
			// Check if file exists
			if ($request->hasFile('file')) {
				$filePath = $request->file('file')->store('images', 'public');
			} else {
				return redirect()->back()->withErrors(['file' => 'No file was uploaded']);
			}

			// Save data with file path
			Post::create([
				'user_id' => $id,
				'title' => $request->title,
				'description' => $request->description,
				'file_path' => $filePath, // Store the uploaded file path
			]);

			DB::commit();
			return redirect()->back()->with('success', 'Post Submitted');
		} catch (\Exception $ex) {
			DB::rollback();
			return redirect()->back()->withErrors(['error' => 'Something went wrong: ' . $ex->getMessage()]);
		}
	}
	
	public function delete_post($id)
	{
		$model = Post::find($id);
		$model->delete();
		return redirect()->back()->with('success', 'Post deleted');
	}
	
	public function show_post($id)
	{
		$post = Post::with('commentss')->findOrFail($id);
		return view('details', compact('post', 'id'));
	}
}
