<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Server;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api');
    }

    public function index(Server $server)
    {
    	$this->authorize('list players on server', $server);

    	return $server->players;
    }
}
