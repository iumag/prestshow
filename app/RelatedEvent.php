<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;
use Illuminate\Support\Facades\DB;

class RelatedEvent extends Model
{
    use FilterPaginateOrder;

    public static $language;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::$language = app()->getLocale();
    }

    protected $fillable = [
        'city_id', 'event_id', 'cost', 'holiday_id', 'sort'
    ];

    protected $filter = [
        'id', 'city_id', 'event_id', 'cost', 'created_at', 'holiday_id', 'sort',
        'city.id', 'city.name', 'city.picture', 'city.description', 'city.cost', 'city.created_at',
        'event.id', 'event.name', 'event.picture', 'event.description', 'event.created_at',
        'holiday.id', 'holiday.name', 'holiday.picture', 'holiday.description', 'holiday.created_at'
    ];

    public static function initalize()
    {
        return [
            'city_id' => 'Select',
            'event_id' => 'Select',
            'holiday_id' => 'Select',
            'cost' => '',
            'sort' => 1,
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

    public function getRelatedEvents($cityId, $holidayId)
    {
        return DB::table('events')
            ->select('events.id', 'event_translations.name')
            ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
            ->join('related_events', 'events.id', '=', 'related_events.event_id')
            ->where('event_translations.locale', '=', self::$language)
            ->where('city_id', $cityId)
            ->where('holiday_id', $holidayId)
            ->get();
    }
}
