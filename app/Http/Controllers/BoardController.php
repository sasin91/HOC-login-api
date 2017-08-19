<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BoardController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Board::with('channels')->paginate(
            request('perPage'),
            request('columns'),
            request('pageName'),
            request('page')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->authorize('create', new Board);

        $this->validate(request(), [    
            'topic'         =>  'required|string|max:255|min:6|spamfree',
            'description'   =>  'required|string|max:255|min:6|spamfree',
        ]); 

        return Board::create([
            'creator_id' => request()->user()->id,
            'topic' => request('topic'),
            'description' => request('description')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        return $board->load('creator', 'channels');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Board $board)
    {
        $this->authorize('update', $board);

        $this->validate(request(), [
            'topic'         =>  'string|max:255|spamfree',
            'description'   =>  'string|max:255|spamfree',
        ]);

        return tap($board)->update(request(['topic', 'description']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $this->authorize('delete', $board);

        $board->delete();
    }
}
