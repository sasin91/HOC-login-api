<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RefundPurchaseRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return !is_null($this->user())
			&& $this->user()->purchases->contains($this->purchase);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'amount' => 'nullable|numeric',
			'currency' => 'nullable|string'
		];
	}

	/**
	 * @param Validator $validator
	 */
	protected function withValidator($validator)
	{
		$validator->after(function ($validator) {
			if (is_null($this->purchase->completed_at)) {
				$validator->errors()->add('purchase', 'Cannot refund an incomplete purchase.');
			}
		});
	}
}
