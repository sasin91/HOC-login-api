<?php

namespace App\Http\Requests;

use App\Purchase;
use Illuminate\Foundation\Http\FormRequest;

class ProcessPaymentRequest extends FormRequest
{
	/**
	 * @var Purchase
	 */
	public $purchase;

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return in_array($this->ip(), array_merge($this->quickPay(), ['127.0.0.1']));
	}

	/**
	 * 193.162.142.208/28
	 *
	 * @return array
	 */
	protected function quickPay()
	{
		return [
			'193.162.142.208',
			'193.162.142.209',
			'193.162.142.210',
			'193.162.142.211',
			'193.162.142.212',
			'193.162.142.213',
			'193.162.142.214',
			'193.162.142.215',
			'193.162.142.216',
			'193.162.142.217',
			'193.162.142.218',
			'193.162.142.219',
			'193.162.142.220',
			'193.162.142.221',
			'193.162.142.222',
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'order_id' => 'required|string|min:4|max:20|exists:purchases,token',
			'currency' => 'required|string',
			'operations' => 'required|array',
			'metadata' => 'required|array'
		];
	}
}
