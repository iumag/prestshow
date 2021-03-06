<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Transport extends Model
{
    use \Dimsav\Translatable\Translatable;
    use FilterPaginateOrder;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'cost', 'video',  'city_id', 'sort'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at', 'video', 'city_id', 'sort'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => '',
            'cost' => '',
            'video' => '',
            'sort' => 1
        ];
    }

    public function basket_item()
    {
        return $this->morphOne(BasketItem::class);
    }

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'picture');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
