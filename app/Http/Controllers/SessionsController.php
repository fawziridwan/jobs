<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use Alert;
use App\Http\Requests\SessionRequest;

class SessionsController extends Controller
{
	public function login()
	{
		if ($user = Sentinel::check())	{
			Alert::success('Login success ','Welcome, '.$user->first_name);
		return redirect('/');
	} else {
		return view('sessions.login');
		}
	}

	public function login_store(SessionRequest $request)
	{
		if($user = Sentinel::authenticate($request->all())) {
			Alert::success('Login Success', 'Welcome, '.$user->first_name);
			return redirect()->intended('/');
		} else {
			Alert::error('Error', 'Login Fails');
			return view('sessions.login');
		}
	}		

	public function logout()
	{
    	if ($user = Sentinel::logout()) {
    		Alert::success('Logout Success');
    		return redirect()->intended('/');
    	} else {
    		Alert::error('Logout fails');
    	}		
	}
}
