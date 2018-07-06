<?php

namespace Ixiaozi\Multi\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index(Request $request){
    	return view('multi::system.index');
    }

    public function welcome(Request $request) {
    	return view('multi::system.welcome');
    }
    public function category(Request $request) {
    	return view('multi::system.category');
    }
}
