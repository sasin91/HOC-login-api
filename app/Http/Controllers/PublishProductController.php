<?php

namespace App\Http\Controllers;

use App\Product;

class PublishProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	public function update()
	{
		$this->validate(request(), [
			'id' => 'required|exists:products,id',
			'date' => 'nullable|date'
		]);

		$product = Product::unpublished()->find(request('id'));
		$this->authorize('update', $product);

		return $product->publish(request('date'));
	}
}
