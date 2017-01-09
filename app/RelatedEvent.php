<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedEvent extends Model
{
    protected $fillable = [
        'city_id', 'event_id', 'cost'
    ];

    protected $filter = [
        'id', 'city_id', 'event_id', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'city_id' => 'Select',
            'event_id' => 'Select',
            'cost' => '',
            'cities' => [
                City::initalize()
            ],
            'events' => [
                Event::initalize()
            ]
        ];
    }
}
