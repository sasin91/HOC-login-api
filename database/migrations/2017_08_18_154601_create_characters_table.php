<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id')->index();
            $table->foreign('player_id')->references('id')->on('players');

            $table->unsignedInteger('template_id')->index();
            $table->foreign('template_id')->references('id')->on('character_templates');

            $table->string('name');
            $table->integer('health');

            $table->string('resource_type');
            $table->integer('resource');

            $table->integer('stamina');

            $table->boolean('melee');
            $table->boolean('ranged');
            $table->float('range');

            $table->string('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('characters');
    }
}
