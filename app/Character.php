<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
    	'health', 'resource', 'resource_type', 'stamina', 'role',
    	'melee', 'ranged', 'range', 'template_id', 'player_id', 'name'
    ];

    protected $casts = [
    	'melee'  => 'boolean',
    	'ranged' => 'boolean',
    ];

	/**
	 * Dynamically set the template id and eagerly scaffold the character from it.
	 *
	 * @param $id
	 */
    public function setTemplateIdAttribute($id)
    {
	    $this->attributes['template_id'] = $id;

    	$this->scaffold();
    }

	/**
	 * Scaffold a character from the given template.
	 *
	 * @param \App\CharacterTemplate $template
	 * @return $this
	 */
   	public function scaffold($template = null)
   	{
   		$template = $template ?: $this->template;

	    return $this->fill(array_merge($template->getAttributes(), $this->attributes));
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
