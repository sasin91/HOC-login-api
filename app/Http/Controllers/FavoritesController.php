<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api');
    }

    public function store(Reply $reply)
    {
    	$reply->favorite();
    }

    public function destroy(Reply $reply)
    {
    	$reply->unfavorite();
    }
}
