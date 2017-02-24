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
        'name', 'picture', 'description', 'cost', 'video', 'status', 'sort'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at', 'video', 'status', 'sort'
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
            'status' => 1
        ];
    }

    public function hotel()
    {
        return $this->HasMany(Hotel::class);
    }

    public function photographer()
    {
        return $this->HasMany(Photographer::class);
    }

    public function transport()
    {
        return $this->HasMany(Transport::class);
    }

    public function related_event()
    {
        return $this->HasMany(RelatedEvent::class);
    }

    public function basket_items()
    {
        return $this->morphMany(BasketItem::class, 'entity');
    }

    public function pictures(){
        return $this->morphMany(Picture::class, 'picture');
    }
}
