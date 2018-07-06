<?php

namespace Ixiaozi\Multi\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){
    	return view('multi::index.index');
    }

    public function welcome(Request $request) {
    	return view('multi::index.welcome');
    }
}
