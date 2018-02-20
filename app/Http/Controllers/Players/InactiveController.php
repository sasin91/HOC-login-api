<?php

namespace App\Http\Controllers\Players;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;

class InactiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        abort_unless(
            request()->user()->hasPermissionTo('list inactive players'),
            403,
            'Insufficient permissions.'
        );

        return Player::inactive()->get();
    }
}
