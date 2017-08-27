<?php

namespace App\Http\Requests;

use App\Billing\Payment;
use App\CharacterTemplate;
use App\Player;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseCharacterRequest extends FormRequest
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

		if ($this->id) {
			$this['character_template'] = CharacterTemplate::find($this->id);
		} else {
			$this['character_template'] = CharacterTemplate::whereName($this->name)->first();
		}

		$this['player'] = Player::find($this->player_id);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'gateway' => 'nullable|string|gateway',
			'player_id' => 'required|exists:players,id',
			'id' => 'required_without:name|exists:character_templates,id',
			'name' => 'required_without:id|exists:character_templates,name'
		];
	}
}
