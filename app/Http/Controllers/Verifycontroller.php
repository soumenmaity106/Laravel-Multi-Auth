<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Verifycontroller extends Controller
{
    //

    public function verify($token){
    	 	$user = User::where('token', $token)->firstOrfail()->update(['token' => null]);

    	 	return redirect()->route('home')->with('success','Account Verify');

    }
}
