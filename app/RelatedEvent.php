<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class RelatedEvent extends Model
{
    use FilterPaginateOrder;

    protected $fillable = [
        'city_id', 'event_id', 'cost', 'holiday_id'
    ];

    protected $filter = [
        'id', 'city_id', 'event_id', 'cost', 'created_at', 'holiday_id',
        'city.id', 'city.name', 'city.picture', 'city.description', 'city.cost', 'city.created_at',
        'event.id', 'event.name', 'event.picture', 'event.description', 'event.created_at',
        'holiday.id', 'holiday.name', 'holiday.picture', 'holiday.description', 'holiday.created_at'
    ];

    public static function initalize()
    {
        return [
            'city_id' => 'Select',
            'event_id' => 'Select',
            'cost' => ''
        ];
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function holiday()
    {
        return $this->belongsTo(Holiday::class);
    }


    public function basket_item()
    {
        return $this->morphOne(BasketItem::class);
    }
}
