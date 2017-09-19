<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardCoverController extends Controller
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
    public function store(Request $request, Board $board)
    {
        $this->authorize('update', $board);

        $this->validate(request(), [
            'photo' =>  ['required', 'image']
        ]);

        return tap($board)->update([
            'photo_path' => request()->file('photo')->store('boards', 'public')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response s
     */
    public function destroy(Board $board)
    {
        $this->authorize('update', $board);

        return tap($board)->update([
            'photo_path' => null
        ]);
    }
}
