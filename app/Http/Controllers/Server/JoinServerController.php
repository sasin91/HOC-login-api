<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Concerns\FindsPlayer;
use App\Http\Controllers\Controller;
use App\Server;
use Illuminate\Http\Request;

class JoinServerController extends Controller
{
	use FindsPlayer;

    public function __construct()
    {
    	$this->middleware('auth:api');
    }

    public function store(Server $server)
    {
    	if ($server->is_full) {
    		return response('Server is full.', 503);
    	}

    	if (request()->user()->servers->contains($server)) {
    		return response(tap($this->findPlayer($server))->update(['online_at' => now()]), 304);
    	}

    	return request()->user()->players()->create([
    		'server_id' => $server->id,
    		'online_at' => now()
    	]);
    }
}
