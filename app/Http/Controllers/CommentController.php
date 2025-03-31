<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

class CommentController extends Controller
{
    public function submit_comment(Request $request)
	{
		$data = $request->only('post_id', 'comment');
		Comment::insert($data);
		return redirect()->back()->with('success', 'Comment added.');
	}
}
