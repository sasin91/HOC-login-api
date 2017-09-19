<?php

namespace App;

use App\Jobs\ScrapOldPhoto;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = [];

    protected $appends = [];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($channel) {
            if ($channel->isDirty('photo_path')) {
                ScrapOldPhoto::dispatch($channel, 'boards');
            }
        });

        static::deleting(function ($channel) {
            ScrapOldPhoto::dispatch($channel, 'boards');
        });
    }
    
    public function getLinksAttribute()
    {
        return [
            'self' => $this->path(),
            'creator' => route('profile', $this->creator),
            'channels' => route('board.channels.index', $this),
        ];
    }

    public function getPhotoUrlAttribute()
    {
        if ($value = $this->photo_path) {
            return url("{$value}");
        }

        return $this->defaultPhotoUrl();
    }

    public function defaultPhotoUrl()
    {
        return 'http://via.placeholder.com/800x600';
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
