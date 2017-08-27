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
	 * Scaffold a new character from given template.
	 *
	 * @param CharacterTemplate $template
	 * @return Character
	 */
	public static function scaffold($template)
	{
		return (new static)->inheritTemplateAttributes($template);
	}

	/**
	 * Dynamically set the template id and eagerly scaffold the character from it.
	 *
	 * @param $id
	 */
    public function setTemplateIdAttribute($id)
    {
	    $this->attributes['template_id'] = $id;

	    $this->inheritTemplateAttributes();
    }

	/**
	 * Scaffold a character from the given template.
	 *
	 * @param \App\CharacterTemplate $template
	 * @return $this
	 */
	public function inheritTemplateAttributes($template = null)
   	{
   		$template = $template ?: $this->template;

	    return $this->fill(array_merge($template->getAttributes(), $this->attributes));
   	}

	/**
	 * A character belongs to a player.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function player() 
    {
    	return $this->belongsTo(Player::class);
    }

	/**
	 * A character can be built from a template.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function template() 
    {
    	return $this->belongsTo(CharacterTemplate::class, 'template_id');
    }
}
