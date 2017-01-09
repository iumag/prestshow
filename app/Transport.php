<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'hotel', 'picture', 'description', 'city_id', 'cost'
    ];

    protected $filter = [
        'id', 'hotel', 'picture', 'description', 'city_id', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'hotel' => '',
            'picture' => '',
            'description' => '',
            'city_id' => 'Select',
            'cost' => '',
            'cities' => [
                City::initalize()
            ]
        ];
    }
}
