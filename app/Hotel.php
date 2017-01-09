<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'hotel', 'picture', 'description', 'city_id'
    ];

    protected $filter = [
        'id', 'hotel', 'picture', 'description', 'created_at',
        'city.id', 'city.city', 'city.picture', 'city.description', 'city.cost', 'city.created_at'
    ];

    public static function initalize()
    {
        return [
            'hotel' => '',
            'picture' => '',
            'description' => '',
            'city_id' => 'Select',
            'cities' => [
                City::initalize()
            ]
        ];
    }
}
