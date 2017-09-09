<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

trait HandlePermissions
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
			'ids.*' => 'exists:permissions,id',
			'names' => 'required_without:ids',
			'names.*' => 'string|exists:permissions,name'
		];
	}

	/**
	 * Extract the permission ids from given request.
	 *
	 * @param Request $request
	 * @return Collection
	 */
	protected function permissions($request)
	{
		if ($request->has('names')) {
			return Permission::whereIn('name', array_wrap($request->names))->get();
		}

		return collect($request->ids);
	}
}