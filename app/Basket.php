<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
        'FIO', 'email', 'phone', 'message'
    ];

    protected $filter = [
        'id', 'FIO', 'email', 'phone', 'message', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'FIO' => '',
            'email' => '',
            'phone' => '',
            'message' => ''
        ];
    }
}
