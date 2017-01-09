<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event', 'picture', 'description'
    ];

    protected $filter = [
        'id', 'event', 'picture', 'description', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'event' => '',
            'picture' => '',
            'description' => ''
        ];
    }
}
