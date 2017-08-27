<?php

namespace App\Http\Requests;

use App\Billing\Payment;
use App\Player;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseProductRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return !is_null($this->user());
	}

	/**
	 * Configure the validator instance.
	 *
	 * @param  \Illuminate\Validation\Validator $validator
	 * @return void
	 */
	public function withValidator($validator)
	{
		$validator->sometimes('payment_token', 'required|string', function () {
			return Payment::requiresToken();
		});

		if ($this->player_id) {
			$this['player'] = Player::find($this->player_id);
		}

		$validator->after(function ($validator) {
			if ($this->product->is_virtual && is_null($this->player_id)) {
				$validator->errors()->add('player_id', 'player_id is required.');
			}
		});
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'player_id' => 'nullable|exists:players,id'
		];
	}
}
