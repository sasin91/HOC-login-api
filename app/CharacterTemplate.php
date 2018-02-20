<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterTemplate extends Model
{
    protected $fillable = [
        'cost',
        'currency',
        'health', 'resource', 'resource_type', 'stamina', 'role',
        'melee', 'ranged', 'range', 'name'
    ];

    protected $casts = [
        'cost' => 'float',
        'melee'  => 'boolean',
        'ranged' => 'boolean',
    ];
}
