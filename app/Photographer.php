<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Photographer extends Model
{
    use FilterPaginateOrder;

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

    public function basket_item()
    {
        return $this->morphOne(BasketItem::class);
    }
}
