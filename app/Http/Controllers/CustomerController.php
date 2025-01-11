<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

use Auth;

class CustomerController extends Controller
{
    public function index(Request $request)
	{
		if(request()->isMethod('GET')) {
			return view('customer_register');
		}
		
		if(request()->method() == 'POST') {
			$validatedData = $request->validate([
				'name' => 'required|string',
				'email' => 'required|email|unique:customers,email',
				'password' => 'required|min:6'
			]);
			
			$data = array(
				'name' => $request->name,
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'created_at' => NOW(),
				'updated_at' => NOW()
			);
			
			Customer::create($data);
			
			return redirect()->back()->with('success', 'Successfully registered');
		}
	}
	
	public function login(Request $request)
	{
		if(request()->isMethod('GET')) {
			return view('customer_login');
		}
		
		if(request()->isMethod('POST'))
		{
			$validateData = $request->validate([
				'email' => 'required|email',
				'password' => 'required'
			]);
			
			$data = array(
				'email' => $request->email,
				'password' => $request->password
			);
			
			if(Auth::guard('customer')->attempt($data))
			{
				return redirect('/customer-dashboard');
			}else {
				return redirect()->back()->with('success', 'Invalid enter');
			}
			
			return redirect('/customer-dashboard');
		}
	}
	
	public function customer_dashboard()
	{
		return view('customer_dashboard');
	}
	
	public function logout()
	{
		Auth::guard('customer')->logout();
		return redirect('/customer-logout');
	}
}
