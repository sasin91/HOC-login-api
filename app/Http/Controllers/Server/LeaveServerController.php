<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Concerns\FindsPlayer;
use App\Http\Controllers\Controller;
use App\Server;
use Illuminate\Http\Request;

class LeaveServerController extends Controller
{
	use FindsPlayer;

    public function __construct()
    {
    	$this->middleware('auth:api');
    }

    public function store(Server $server)
    {
    	if (! request()->user()->servers->contains($server)) {
    		return response(304);
    	}

    	$this->findPlayer($server)->delete();
    }
}
