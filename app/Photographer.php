<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    protected $fillable = [
        'photographer', 'picture', 'description', 'cost'
    ];

    protected $filter = [
        'id', 'photographer', 'picture', 'description', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'photographer' => '',
            'picture' => '',
            'description' => '',
            'cost' => ''
        ];
    }
}
