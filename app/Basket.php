<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Basket extends Model
{
    use FilterPaginateOrder;

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
            'message' => '',
            'items' => [
                BasketItem::initalize()
            ]
        ];
    }

    public function items()
    {
        return $this->hasMany(BasketItem::class);
    }
}
