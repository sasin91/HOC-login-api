<?php

namespace App\Http\Controllers\Concerns;

trait FindsPlayer 
{
	protected function findPlayer($server)
    {
    	return request()->user()
    	->players()
    	->whereHas('server', function ($query) use($server) {
    		return $query->whereKey($server->getKey());
    	});

    }
}