<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Board $board)
    {
        return $board->channels;
    }
}
