<?php

namespace Tests\Unit;

use App\Billing\ChevronGateway;
use App\Billing\GatewayException;
use App\Billing\PaymentFailedException;
use App\Player;
use App\Purchase;
use App\Transaction;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ChevronGatewayTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @var ChevronGateway
	 */
	protected $gateway;

	protected function setUp()
	{
		parent::setUp();

		$this->gateway = new ChevronGateway;
	}


	/** @test */
	public function it_charges_a_players_chevrons()
	{
		$player = factory(Player::class)->create(['chevron' => 1000]);

		$transaction = $this->gateway->user($player)->charge(500);

		$this->assertEquals(500, $transaction->amount);
		$this->assertEquals(500, $player->fresh()->chevron);
		$this->assertEquals(500, $this->gateway->totalCharges());
	}

	/** @test */
	public function it_refunds_a_players_chevrons()
	{
		$player = factory(Player::class)->create(['chevron' => 1000]);
		$transaction = $this->gateway->user($player)->charge(500);
		$this->completeTransaction($transaction);

		$this->gateway->refund($transaction->provider_id);
		$transaction->refresh();
		$player->refresh();

		$this->assertEquals(1000, $player->chevron);
		$this->assertEquals(500, $this->gateway->totalRefunds());
		$this->assertEquals(0, $this->gateway->totalCharges());
		$this->assertNotNull($transaction->refunded_at);
		$this->assertEquals(500, $transaction->refunded_amount);
	}

	/** @test */
	public function it_can_partially_refund_a_transaction()
	{
		$player = factory(Player::class)->create(['chevron' => 1000]);
		$transaction = $this->gateway->user($player)->charge(500);
		$this->completeTransaction($transaction);

		$this->gateway->refund($transaction->provider_id, 200);
		$transaction->refresh();
		$player->refresh();

		$this->assertEquals(700, $player->chevron);
		$this->assertEquals(200, $this->gateway->totalRefunds());
		$this->assertEquals(0, $this->gateway->totalCharges());
		$this->assertNotNull($transaction->refunded_at);
		$this->assertEquals(200, $transaction->refunded_amount);
	}

	/** @test */
	public function cannot_refund_within_a_valid_provider_id()
	{
		$player = factory(Player::class)->create();

		$this->disableExceptionHandling();

		try {
			$this->gateway->user($player)->refund('fake-provider-id', 10000);
		} catch (PaymentFailedException $e) {
			$this->assertEquals("Invalid token [fake-provider-id].", $e->getMessage());
		}
	}

	/** @test */
	public function cannot_charge_negative_or_zero_amount()
	{
		$player = factory(Player::class)->create();

		$this->disableExceptionHandling();

		try {
			$this->gateway->user($player)->charge(-100);
		} catch (GatewayException $e) {
			$this->assertEquals("Invalid amount [-100].", $e->getMessage());
		}

		try {
			$this->gateway->user($player)->charge(0);
		} catch (GatewayException $e) {
			$this->assertEquals("Invalid amount [0].", $e->getMessage());
		}
	}

	/** @test */
	public function cannot_charge_without_a_player()
	{
		$this->disableExceptionHandling();

		try {
			$this->gateway->charge(10);
		} catch(GatewayException $e) {
			$this->assertEquals('No user found on PaymentGateway.', $e->getMessage());
		}
	}

	/** @test */
	public function cannot_refund_without_a_player()
	{
		$this->disableExceptionHandling();

		try {
			$this->gateway->refund(10);
		} catch(GatewayException $e) {
			$this->assertEquals('No user found on PaymentGateway.', $e->getMessage());
		}
	}

	/** @test */
	public function cannot_refund_negative_or_zero_amount()
	{
		$player = factory(Player::class)->create(['chevron' => 100]);

		$this->disableExceptionHandling();
		$id = $this->gateway->user($player)->charge(100)->provider_id;

		try {
			$this->gateway->user($player)->refund($id, -100);
		} catch (GatewayException $e) {
			$this->assertEquals("Invalid amount [-100].", $e->getMessage());
		}

		try {
			$this->gateway->user($player)->refund($id, 0);
		} catch (GatewayException $e) {
			$this->assertEquals("Invalid amount [0].", $e->getMessage());
		}
	}

	private function completeTransaction(Transaction $transaction)
	{
		$transaction->purchase()->associate(factory(Purchase::class)->create());
		$transaction->saveOrFail();

		return $transaction;
	}
}
