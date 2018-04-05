<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}

    public function ShowLoginFrom(){
    	return view('auth.admin-login');
    }

    public function login(Request $request){

    	//validate the form data

    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6',
    	]);

    	//Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)){
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	// if unsuccessful, then redirect to ther login with the forrm data

    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
