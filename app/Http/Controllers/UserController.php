<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

class UserController extends Controller
{
    public function index()
	{
		return view("register");
	}
	
	public function register(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6',
		]);
		
		$password = bcrypt($request->password);
		$data = array(
			'name' => $request->name,
			'email' => $request->email,
			'password' => $password
		);
		
		User::create($data);
		
		return redirect()->back()->with('success', 'Successfully registered');
	}
	
	public function login(Request $request)
	{
		if(request()->method() == 'GET')
		{
			return view('login');
		}
		
		if(request()->isMethod('POST'))
		{
			$validatedData = $request->validate([
				'email' => 'required|email',
				'password' => 'required'
			]);
			
			$data = array(
				'email' => $request->email,
				'password' => $request->password
			);
			
			if(Auth::attempt($data))
			{
				return redirect('dashboard');
			}else {
				return redirect()->back()->with('success', 'Invalid enter');
			}
		}
	}
	
	public function logout()
	{
		Auth::logout();
		return redirect('login');
	}
}
