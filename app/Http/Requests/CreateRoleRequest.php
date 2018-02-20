<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;
use Spatie\Permission\Contracts\Permission;

class CreateRoleRequest extends FormRequest
{
    /**
     * @var Collection
     */
    protected $invalidPermissions;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
        ];
    }

    /**
     * @param Validator $validator
     */
    protected function withValidator($validator)
    {
        $validator->after(function (Validator $validator) {
            if ($this->has('permissions') && $this->invalidPermissions()->isNotEmpty()) {
                $validator->errors()->add('permissions', trans('validation.exists', ['attribute' => 'permissions']));
            }
        });
    }

    protected function invalidPermissions()
    {
        return $this->invalidPermissions = collect($this->permissions)->filter(function ($permission) {
            if (is_numeric($permission)) {
                return !resolve(Permission::class)->whereKey($permission)->exists();
            }

            return !resolve(Permission::class)->findByName($permission)->exists;
        });
    }
}
