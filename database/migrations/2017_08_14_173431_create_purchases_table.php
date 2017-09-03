<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function (Blueprint $table) {
			$table->increments('id');
			$table->string('token')->nullable();
			$table->string('payment_type')->nullable();
			$table->string('card_last_four', 4)->nullable();
			$table->string('provider_id')->nullable();

			$table->morphs('buyer');
			$table->morphs('purchasable');

			$table->string('currency');
			$table->decimal('amount');

			$table->timestamp('completed_at')->nullable();

			$table->softDeletes('refunded_at');
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
		Schema::drop('purchases');
	}
}
