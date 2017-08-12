<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api');
    }

    public function show()
    {
    	return request()->user()->load(['players', 'servers']);
    }
}
