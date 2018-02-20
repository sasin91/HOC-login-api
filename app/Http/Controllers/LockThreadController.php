<?php

namespace App\Http\Controllers;

use App\Thread;

class LockThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function update(Thread $thread)
    {
        $this->authorize('update', $thread);

        $this->validate(request(), ['locked_at' => 'nullable|date']);

        return tap($thread)->update([
            'locked_by' => request()->user()->id,
            'locked_at' => array_get(request(), 'locked_at', now())
        ]);
    }
}
