<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlayerController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api');

    	$this->authorizeResource(Player::class);
    }

    public function show(Player $player)
    {
    	return $player->load(['server', 'user', 'characters']);
    }

    public function update(Player $player)
    {
    	// Not sure about server ID,
    	// might want to validate something like a Payment_token with it.
    	// last_seen_at will be set when online_at is changed.
    	
    	$this->authorize(request(), [
    		'server_id'		=>	[Rule::exists('servers', 'id')],
	        'online_at'		=>	['date']
    	]);

    	return tap($player)->update(request()->intersect(['server_id', 'online_at']));
    }

    public function destroy(Player $player)
    {
    	$player->delete();
    }
}
