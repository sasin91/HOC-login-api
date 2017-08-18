<?php

namespace App;

use App\Jobs\ScrapOldPhoto;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'name', 'slug', 'photo_path'
    ];

    protected $appends = ['photo_url'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($channel) {
            if ($channel->isDirty('photo_path')) {
                ScrapOldPhoto::dispatch($channel, 'channels');
            }
        });

        static::deleting(function ($channel) {
            ScrapOldPhoto::dispatch($channel, 'channels');
        });
    }

    /**
     * Get the profile photo URL attribute.
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
