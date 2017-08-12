<?php

namespace App\Http\Controllers;

use App\Formatters\DataStringFormatter;
use App\Http\Requests\Server\{StoreServerRequest, UpdateServerRequest};
use App\Repositories\ServerRepository;
use App\Repositories\ServerRepositoryContract;
use App\Server;
use Illuminate\Http\Request;

/**
 * @resource Servers
 */
class ServersController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth:api')->except(['index', 'show']);


        $this->authorizeResource(Server::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Server::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), $rules = [
            'name'          =>  'string|required',
            'ip'            =>  'ip|required',
            'game_type'     =>  'string',
            'map'           =>  'string',
            'player_limit'  =>  'integer',
            'MNP'           =>  'string'
        ]);

        return Server::create(
            $request->intersect(array_keys($rules))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        return $server;
        //return (new DataStringFormatter)->format($server->jsonSerialize());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Server $server)
    {
        $this->validate(request(), $rules = [
            'name'          =>  'string',
            'ip'            =>  'ip',
            'game_type'     =>  'string',
            'map'           =>  'string',
            'player_limit'  =>  'integer',
            'MNP'           =>  'string'
        ]);

        return tap($server)->update(
            $request->intersect(array_keys($rules))
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        $server->delete();
    }
}
