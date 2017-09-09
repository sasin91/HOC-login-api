<?php

namespace App\Http\Requests;

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
		$validator->sometimes('player_id', 'required|exists:players,id', function () {
			return !$this->has('owner') && $this->product->is_virtual;
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
			'gateway' => 'string|gateway',
			'owner' => 'nullable|array',
			'owner.type' => 'required_with:owner|string|model',
			'owner.id' => 'required_with:owner'
		];
	}
}
