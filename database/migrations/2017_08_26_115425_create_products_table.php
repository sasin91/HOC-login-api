<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->boolean('reusable')->default(true);
			$table->boolean('is_virtual')->default(false);
			$table->string('name');
			$table->string('type')->index();
			$table->string('command');
			$table->string('value');
			$table->string('currency');
			$table->decimal('cost');
			$table->text('description');
			$table->string('lifetime')->nullable();
			$table->timestamp('published_at')->nullable();
			$table->softDeletes();
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
		Schema::drop('products');
	}
}
