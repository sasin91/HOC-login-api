<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('creator_id')->nullable();
            $table->foreign('creator_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade');

            $table->unsignedInteger('board_id')->nullable();
            $table->foreign('board_id')
                  ->references('id')
                  ->on('boards')
                  ->onUpdate('cascade');

            $table->string('name', 50);
            $table->string('slug', 50);
            $table->string('description');
            $table->text('photo_path')->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('channels');
    }
}
