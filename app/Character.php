<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
    	'health', 'resource', 'resource_type', 'stamina', 'role'
    	'melee', 'ranged', 'range', 'template_id', 'player_id'
    ];

    protected $casts = [
    	'melee'  => 'boolean',
    	'ranged' => 'boolean',
    ];

    public function setTemplateIdAttribute($id)
    {
    	$this->scaffold($id);
    }

   	public function scaffold($template = null)
   	{
   		if ($template) {
   			$this->template()->associate($template);
   		}

   		return $this->forceFill([
   			'health' => $this->template->health,
   			'resource' => $this->template->resource,
   			'resource_type' => $this->template->resource_type,
   			'stamina' => $this->template->stamina,
   			'role' => $this->template->role,
   			'melee' => $this->template->melee,
   			'ranged' => $this->template->ranged,
   			'range' => $this->template->range,
   		]);
   	}

    public function player() 
    {
    	return $this->belongsTo(Player::class);
    }

    public function template() 
    {
    	return $this->belongsTo(CharacterTemplate::class, 'template_id');
    }
}
