<?php

namespace App\Rules;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class ValidModel
{
    /**
     * Determine if the given attribute is a valid model.
     *
     * @param  string $attribute
     * @param  string $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!$value) {
            return false;
        }

        if (!class_exists($value)) {
            return $this->passes($attribute, Relation::getMorphedModel($value));
        }

        return class_exists($value) && resolve($value) instanceof Model;
    }
}
