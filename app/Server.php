<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $withCount = ['players'];

    protected $fillable = [
        'name',
        'ip',
        'map',
        'game_type',
        'players_limit',
        'MNP'
    ];

    protected $casts = [
        'players_limit'  => 'integer',
        'players_count' =>  'integer'
    ];

    protected $appends = ['is_full'];


    public function getIsFullAttribute()
    {
        return $this->players_count === $this->players_limit;
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
