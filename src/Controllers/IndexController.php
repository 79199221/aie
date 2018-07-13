<?php

namespace Ixiaozi\Aie\Controllers;

use Illuminate\Http\Request;
use Ixiaozi\Aie\Facades\Aie;

class IndexController extends Controller
{
    public function index(Request $request){
    	dd(Aie::platform('eub'));
    }

    public function welcome(Request $request) {
    	return view('Aie::index.welcome');
    }
}
