<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
    	'creator_id', 'topic', 'description'
    ];

    protected $appends = ['links'];
    
    public function getLinksAttribute()
    {
        return [
            'self' => $this->path(),
            'creator' => route('profile', $this->creator),
            'channels' => route('board.channels.index', $this),
        ];
    }

    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function path()
    {
        return route('board.show', [$this]);
    }


    public function creator() 
    {
    	return $this->belongsTo(User::class);
    }

    public function channels() 
    {
    	return $this->hasMany(Channel::class);
    }
}
