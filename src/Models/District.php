<?php

namespace HavenPlus\Districts\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class District extends Model
{
    use Sushi;

    /**
     * The data rows
     *
     * @var array
     */
    protected $rowa = [
        [
            'iso_code' => 'LL',
            'name' => 'Lilongwe'
        ],
        [
            'iso_code' => 'SA',
            'name' => 'Salima'
        ],
        [
            'iso_code' => 'BT',
            'name' => 'Blantyre'
        ]
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('exclude_districts', function (Builder $builder) {
            $builder->whereNotIn('iso_code', config('disctricts.exclude', []));
        });
    }

    /**
     * Get the district name.
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        $transKey = sprintf('districts.%s', $this->iso_code);
        $name = trans($transKey);

        return $name === $transKey ? $value : $name;
    }
}
