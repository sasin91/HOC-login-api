<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function (Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('user_id')->onUpdate('cascade')->index();
			$table->foreign('user_id')->references('id')->on('users');

			$table->unsignedInteger('purchase_id')->onUpdate('cascade')->index();
			$table->foreign('purchase_id')->references('id')->on('purchases');

			$table->string('gateway')->index();
			$table->string('provider_id');
			$table->string('currency');
			$table->decimal('amount');

			$table->string('payment_type')->nullable();
			$table->string('card_last_four')->nullable();

			$table->decimal('refunded_amount')->nullable();
			$table->timestamp('refunded_at')->nullable();
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
		Schema::drop('transactions');
	}
}
