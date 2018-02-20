<?php

namespace App;

use App\Jobs\ScrapOldPhoto;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = [];

    protected $appends = ['photo_url'];

    /**
     * Boot the Model.
     * This model run once per lifecycle.
     *
     * @return void
     */
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
    
    /**
     * Get the links attribute
     *
     * @return array
     */
    public function getLinksAttribute()
    {
        return [
            'self' => $this->path(),
            'creator' => route('profile', $this->creator),
            'channels' => route('board.channels.index', $this),
        ];
    }

    /**
     * Get the photo_url attribute
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        if ($value = $this->photo_path) {
            return filter_var($value, FILTER_VALIDATE_URL)
            ? url($value)
            : $value;
        }

        return $this->defaultPhotoUrl();
    }

    /**
     * Default photo url
     *
     * @return string
     */
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

    /**
     * A Board has a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Board has many channels below it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
