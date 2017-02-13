<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Hotel extends Model
{
    use \Dimsav\Translatable\Translatable;
    use FilterPaginateOrder;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'city_id', 'cost'
    ];

    protected $filter = [
        'id', 'name', 'city_id', 'cost', 'picture', 'description', 'created_at',
        'city.id', 'city.name', 'city.picture', 'city.description', 'city.cost', 'city.created_at'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
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

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'picture');
    }
}
