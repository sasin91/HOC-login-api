<?php

namespace App\Http\Controllers;

use App\Billing\Payment;
use App\Http\Requests\PurchaseProductRequest;
use App\Player;
use App\Product;
use Illuminate\Http\Request;

class PurchaseProductController extends Controller
{
	public function store(PurchaseProductRequest $request, Product $product)
	{
		$gateway = $this->determineGateway($request);
		$gateway->user($owner = $this->getOwner($request, $product));

		try {
			return $gateway->charge($owner->purchase($product));
		} catch (\RuntimeException $e) {
			abort($e->getCode(), $e->getMessage());
		}
	}

	private function getOwner(Request $request, Product $product)
	{
		return $product->is_virtual ? Player::find($request->get('player_id')) : $request->user();
	}

	private function determineGateway(Request $request)
	{
		if ($request->has('gateway')) {
			return Payment::driver($request->gateway);
		}

		return Payment::getFacadeRoot();
	}
}
