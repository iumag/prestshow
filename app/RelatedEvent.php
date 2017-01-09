<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class RelatedEvent extends Model
{
    use FilterPaginateOrder;

    protected $fillable = [
        'city_id', 'event_id', 'cost'
    ];

    protected $filter = [
        'id', 'city_id', 'event_id', 'cost', 'created_at',
        'city.id', 'city.city', 'city.picture', 'city.description', 'city.cost', 'city.created_at',
        'event.id', 'event.event', 'event.picture', 'event.description', 'event.created_at'
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
}
