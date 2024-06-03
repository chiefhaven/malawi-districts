<?php

namespace HavenPlus\Districts\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use HavenPlus\Districts\Models\District as DistrictModel;

class District implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return \WW\districts\Models\District
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return DistrictModel::whereIsoCode($value)->first();
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return strtoupper($value);
    }
}
