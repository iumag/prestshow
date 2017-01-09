<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    protected $fillable = [
        'basket_id', 'basket_type'
    ];

    protected $filter = [
        'id', 'basket_id', 'basket_type', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'basket_id' => 'Select',
            'basket_type' => 'Select',
            'basket' => [],
            'basket' => [],
            'message' => ''
        ];
    }
}
