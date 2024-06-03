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
    protected $rows = [
        [
            'iso_code' => 'BA',
            'name' => 'Balaka'
        ],
        [
            'iso_code' => 'BL',
            'name' => 'Blantyre'
        ],
        [
            'iso_code' => 'CK',
            'name' => 'Chikwawa'
        ],
        [
            'iso_code' => 'CR',
            'name' => 'Chiradzulu'
        ],
        [
            'iso_code' => 'CT',
            'name' => 'Chitipa'
        ],
        [
            'iso_code' => 'DE',
            'name' => 'Dedza'
        ],
        [
            'iso_code' => 'DO',
            'name' => 'Dowa'
        ],
        [
            'iso_code' => 'KR',
            'name' => 'Karonga'
        ],
        [
            'iso_code' => 'KS',
            'name' => 'Kasungu'
        ],
        [
            'iso_code' => 'LK',
            'name' => 'Likoma'
        ],
        [
            'iso_code' => 'Ll',
            'name' => 'Lilongwe'
        ],
        [
            'iso_code' => 'MH',
            'name' => 'Machinga'
        ],
        [
            'iso_code' => 'MG',
            'name' => 'Mangochi'
        ],
        [
            'iso_code' => 'MC',
            'name' => 'Mchinji'
        ],
        [
            'iso_code' => 'MU',
            'name' => 'Mulanje'
        ],
        [
            'iso_code' => 'MW',
            'name' => 'Mwanza'
        ],
        [
            'iso_code' => 'MZ',
            'name' => 'Mzimba'
        ],
        [
            'iso_code' => 'NE',
            'name' => 'Neno'
        ],
        [
            'iso_code' => 'NB',
            'name' => 'Nkhata Bay'
        ],
        [
            'iso_code' => 'NK',
            'name' => 'Nkhotakota'
        ],
        [
            'iso_code' => 'NS',
            'name' => 'Nsanje'
        ],
        [
            'iso_code' => 'NU',
            'name' => 'Ntcheu'
        ],
        [
            'iso_code' => 'NI',
            'name' => 'Ntchisi'
        ],
        [
            'iso_code' => 'PH',
            'name' => 'Phalombe'
        ],
        [
            'iso_code' => 'RU',
            'name' => 'Rumphi'
        ],
        [
            'iso_code' => 'SA',
            'name' => 'Salima'
        ],
        [
            'iso_code' => 'TH',
            'name' => 'Thyolo'
        ],
        [
            'iso_code' => 'ZO',
            'name' => 'Zomba'
        ],
        
        
        
        
        
        
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
