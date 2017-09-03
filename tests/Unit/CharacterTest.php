<?php

namespace Tests\Unit;

use App\Character;
use App\CharacterTemplate;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CharacterTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	function can_scaffold_a_character_from_template()
	{
		$template = factory(CharacterTemplate::class)->create();

		$character = Character::scaffold($template);

		$this->assertEquals($template->health, $character->health);
		$this->assertEquals($template->name, $character->name);
		$this->assertEquals($template->resource_type, $character->resource_type);
		$this->assertEquals($template->resource, $character->resource);
		$this->assertEquals($template->stamina, $character->stamina);
		$this->assertEquals($template->melee, $character->melee);
		$this->assertEquals($template->ranged, $character->ranged);
		$this->assertEquals($template->role, $character->role);
	}

	/** @test */
	public function scaffolding_only_overrides_empty_attributes()
	{
		$template = factory(CharacterTemplate::class)->create();

		$character = (new Character(['name' => 'John Doe']))->inheritTemplateAttributes($template);

		$this->assertEquals('John Doe', $character->name);
	}
}
