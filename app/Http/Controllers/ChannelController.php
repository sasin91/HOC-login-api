<?php

namespace App\Http\Controllers;

use App\Board;
use App\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['show']);
    }

    public function show(Channel $channel)
    {
        return $channel->load(['creator', 'threads', 'board']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->authorize('create', new Channel);

        request()->validate([
            'board_id' => 'required|exists:boards,id',
            'name' => 'required|string|max:50|min:3|spamfree',
            'slug' => 'string|max:50|min:3|spamfree',
            'description' => 'string|max:255|spamfree',
            'photo' =>  'string|max:255'
        ]);

        return Channel::create([
            'creator_id'  =>  request()->user() ? request()->user()->id : auth()->id(),
            'board_id'    =>  request('board_id'),
            'name'        =>  request('name'),
            'slug'        =>  request('slug'),
            'description' =>  request('description'),
            'photo'       =>  request('photo')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Board    $board
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Channel $channel)
    {
        $this->authorize('update', $channel);

        $this->validate(request(), [
            'board_id' => 'exists:boards,id',
            'name' => 'string|max:50|min:3|spamfree',
            'description' => 'string|max:255|spamfree',
        ]);

        return tap($channel)->update(request('board_id', 'name', 'description'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $this->authorize('destroy', $channel);

        $channel->delete();
    }
}
