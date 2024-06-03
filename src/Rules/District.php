<?php

namespace HavenPlus\Districts\Rules;

use Illuminate\Contracts\Validation\Rule;
use Country as DistrictModel;

class District implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return DistrictModel::whereIsoCode($value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $message = trans('validation.disctrict');

        return $message === 'validation.district'
            ? ['The selected :attribute is not a valid district.']
            : $message;
    }
}
