<?php

namespace App\Console\Commands;

use App\Player;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class ApplyExperienceBoost extends Command
{
	/**
	 * @var Schedule
	 */
	protected $schedule;

	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'apply:experience-boost {product} {player}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Apply a experience boost product to a player';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Schedule $schedule)
	{
		parent::__construct();

		$this->schedule = $schedule;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$product = $this->product();
		$player = $this->player();

		$player->update(['experience_rate' => $player->experience_rate + $product->value]);

		if ($product->lifetime) {
			$this->schedule->call(function ($product_id, $player_id) {
				$product = Product::find($product_id);
				$player = Player::find($player_id);

				$player->update(['experience_rate' => $player->experience_rate - $product->value]);
			}, [$product->id, $player->id])->at(now()->modify($product->lifetime));
		}
		$this->info("Applied {$product->value}% experience boost to player [{$player->id}].");
	}

	protected function product()
	{
		return Product::withoutGlobalScopes()->find($this->argument('product'));
	}

	protected function player()
	{
		return Player::withoutGlobalScopes()->find($this->argument('player'));
	}
}
