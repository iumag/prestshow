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
        'name', 'picture', 'description', 'city_id', 'cost', 'video'
    ];

    protected $filter = [
        'id', 'name', 'city_id', 'cost', 'picture', 'description', 'created_at', 'video',
        'city.id', 'city.name', 'city.picture', 'city.description', 'city.cost', 'city.created_at'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'cost' => '',
            'picture' => '',
            'description' => '',
            'city_id' => 'Select',
            'video' => ''
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

    public function event()
    {
        return $this->HasMany(Event::class);
    }
}
