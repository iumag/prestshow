<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city', 'picture', 'description', 'cost'
    ];

    protected $filter = [
        'id', 'city', 'picture', 'description', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'city' => '',
            'picture' => '',
            'description' => '',
            'cost' => ''
        ];
    }
}
