<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Holiday extends Model
{
    use FilterPaginateOrder;
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'cost', 'video'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at', 'video'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => '',
            'cost' => '',
            'video' => ''
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
}
