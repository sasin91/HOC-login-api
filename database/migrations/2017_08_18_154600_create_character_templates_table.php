<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacterTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_templates', function (Blueprint $table) {
            $table->increments('id');
	        $table->decimal('cost');
            $table->string('name');
            $table->integer('health');
            $table->string('resource_type');
            $table->integer('resource');
            $table->integer('stamina');
            $table->boolean('melee');
            $table->boolean('ranged');
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
        Schema::drop('character_templates');
    }
}
