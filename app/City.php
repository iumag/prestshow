<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class City extends Model
{
    use \Dimsav\Translatable\Translatable;
    use FilterPaginateOrder;

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'cost'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => '',
            'cost' => ''
        ];
    }

    public function hotel()
    {
        return $this->HasMany(Hotel::class);
    }

    public function related_event()
    {
        return $this->HasMany(RelatedEvent::class);
    }

    public function basket_items()
    {
        return $this->morphMany(BasketItem::class, 'entity');
    }
}
