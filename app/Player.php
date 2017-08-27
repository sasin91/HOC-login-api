<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	use HasPurchases;

    const INACTIVE_AFTER_DAYS = 30;

    protected $fillable = [
        'user_id',
        'server_id',
        'online_at',
	    'last_seen_at',
	    'experience_rate',
	    'experience'
    ];

    protected $dates = ['online_at', 'last_seen_at'];

    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($player) {
            if ($player->isDirty('online_at')) {
                $player->last_seen_at = $player->online_at;
            }
        });
    }

	/**
     * Scope only offline Players.
     *
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOffline($query) 
    {
        return $query->whereNull('online_at');
    } 

    /**
     * Scope only online Players.
     *
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnline($query)
    {
        return $query->whereNotNull('online_at');
    }

    /**
     * Scope only inactive players
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query) 
    {
        return $query->WhereDate('last_seen_at', '<=', $this->freshTimestamp()->subDays(static::INACTIVE_AFTER_DAYS));
    }

    /**
     * Scope only inactive players
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNewbies($query) 
    {
        return $query->whereNull('last_seen_at');
    }

	/**
	 * The server the player is on.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function server()
    {
        return $this->belongsTo(Server::class);
    }

	/**
	 * The authenticatable user the player belongs to.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

	/**
	 * A player have many characters.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function characters()
	{
		return $this->hasMany(Character::class);
	}
}
