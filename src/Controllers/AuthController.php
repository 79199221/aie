<?php

namespace Ixiaozi\Multi\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
	use AuthenticatesUsers;
	
    public function login(Request $request){
		return view('multi::auth.login');
    }

    public function logout(Request $request) {
    	
    }
	
	public function logup(Request $request){
		
    }
}
