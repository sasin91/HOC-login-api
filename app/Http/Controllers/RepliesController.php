<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }

    public function index($channel_id, Thread $thread)
    {
        return $thread->replies()->paginate(20);
    }

    public function store($channel_id, Thread $thread)
    {
        abort_unless(
            Gate::allows('create', new Reply),
            429,
            'Calm yet tits. Too much, too soon.'
        );

        $this->authorize('create', new Reply);

        $this->validate(request(), ['body' => 'required|spamfree']);

        return $thread->addReply([
            'body' => request('body'),
            'user_id' => request()->user()->id
        ])->load('owner');
    }

    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $this->validate(request(), ['body' => 'required|spamfree']);

        return tap($reply)->update(request(['body']));
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);

        $reply->delete();
    }
}
