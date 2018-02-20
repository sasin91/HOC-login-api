<?php

namespace App\Http\Controllers\Players;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        abort_unless(
            request()->user()->hasPermissionTo('list online players'),
            403,
            'Insufficient permissions.'
        );

        return Player::online()->get();
    }
}
