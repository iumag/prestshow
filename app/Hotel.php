<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Hotel extends Model
{
    use FilterPaginateOrder;

    protected $fillable = [
        'hotel', 'picture', 'description', 'city_id', 'cost'
    ];

    protected $filter = [
        'id', 'hotel', 'city_id', 'cost', 'picture', 'description', 'created_at',
        'city.id', 'city.city', 'city.picture', 'city.description', 'city.cost', 'city.created_at'
    ];

    public static function initalize()
    {
        return [
            'hotel' => '',
            'cost' => '',
            'picture' => '',
            'description' => '',
            'city_id' => 'Select'
        ];
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function basket_item()
    {
        return $this->morphOne(BasketItem::class);
    }
}
