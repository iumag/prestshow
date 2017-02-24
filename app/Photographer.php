<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Photographer extends Model
{
    use \Dimsav\Translatable\Translatable;
    use FilterPaginateOrder;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'cost', 'video', 'sort', 'city_id',
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at', 'video', 'sort', 'city_id',
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => '',
            'cost' => '',
            'video' => '',
            'sort' => 1,
            'city_id' => 'Select'
        ];
    }

    public function basket_item()
    {
        return $this->morphOne(BasketItem::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'picture');
    }
}
