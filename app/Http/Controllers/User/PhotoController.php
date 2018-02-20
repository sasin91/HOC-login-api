<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(User $user)
    {
        $this->validate(request(), [
            'photo' =>  ['required', 'image']
        ]);

        return tap($user)->update([
            'photo_url' => request()->file('photo')->store('photos', 'public')
        ]);
    }
}
