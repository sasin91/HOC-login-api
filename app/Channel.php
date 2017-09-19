<?php

namespace App;

use App\Jobs\ScrapOldPhoto;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $guarded = [];

    protected $appends = ['photo_url'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($channel) {
            if (! isset($channel->slug)) {
                $channel->slug = str_slug($channel->name);
            }

            if ($channel->isDirty('photo_path')) {
                ScrapOldPhoto::dispatch($channel, 'channels');
            }
        });

        static::deleting(function ($channel) {
            ScrapOldPhoto::dispatch($channel, 'channels');
        });
    }

    /**
     * Get the links attribute.
     * 
     * @return array
     */
    public function getLinksAttribute()
    {
        return [
            'self' => $this->path(),
            'threads' => route('channel.threads.index', [$this]),
            'creator' => route('profile', [$this->creator]),
            'board' => route('board.show', [$this->board])
        ];
    }

    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function path()
    {
        return route('channel.show', [$this]);
    }

    /**
     * Get the channel photo_url attribute.
     * 
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        if ($value = $this->photo_path) {
            return url("{$value}");
        }

        return $this->defaultPhotoUrl();
    }

    /**
     * Get the default photo url.
     * 
     * @return string
     */
    public function defaultPhotoUrl()
    {
        return 'http://via.placeholder.com/800x600';
    }

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * A Channel belongs on a board.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board() 
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * A channel has a creator.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator() 
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * A channel consists of threads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
