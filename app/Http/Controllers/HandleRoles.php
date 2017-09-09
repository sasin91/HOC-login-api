<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

trait HandleRoles
{
	/**
	 * Validation rules
	 *
	 * @return array
	 */
	protected function rules()
	{
		return [
			'ids' => 'required_without:names',
			'ids.*' => 'exists:roles,id',
			'names' => 'required_without:ids',
			'names.*' => 'string|exists:roles,name'
		];
	}

	/**
	 * Extract the role ids from given request.
	 *
	 * @param Request $request
	 * @return Collection
	 */
	protected function roles($request)
	{
		if ($request->has('names')) {
			return Role::whereIn('name', array_wrap($request->names))->get();
		}

		return collect($request->ids);
	}
}