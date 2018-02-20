<?php

namespace App\Http\Controllers\Players;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;

class NewbiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        abort_unless(
            request()->user()->hasPermissionTo('list newbie players'),
            403,
            'Insufficient permissions.'
        );

        return Player::newbies()->get();
    }
}
