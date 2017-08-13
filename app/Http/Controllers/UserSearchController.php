<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function show()
    {
    	$this->validate(request(), [
    		'query' => 'required|string'
    	]);

    	$search = request('query');

    	// return User::search($search)->get();
   
      	return User::where('name', 'LIKE', "%$search%")
            ->take(5)
            ->pluck('name');
    }
}
