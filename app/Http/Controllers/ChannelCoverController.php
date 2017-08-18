<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelCoverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Channel $channel)
    {
        $this->authorize('update', $channel);

        $this->validate(request(), [
            'photo' =>  ['required', 'image']
        ]);

        return tap($channel)->update([
            'photo_path' => request()->file('photo')->store('channels', 'public')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response s
     */
    public function destroy(Channel $channel)
    {
        $this->authorize('update', $channel);

        return tap($channel)->update([
            'photo_path' => null
        ]);
    }
}
