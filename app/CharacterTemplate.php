<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterTemplate extends Model
{
    protected $fillable = [
    	'health', 'resource', 'resource_type', 'stamina', 'role',
    	'melee', 'ranged', 'range'
    ];

    protected $casts = [
    	'melee'  => 'boolean',
    	'ranged' => 'boolean',
    ];
}
