<?php

namespace App\Http\Controllers\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'photo'	=>	['required', 'image']
    	]);

    	return tap(request()->user())->update([
    		'photo_path' => request()->file('photo')->store('avatars', 'public')
    	]);
    }
}
