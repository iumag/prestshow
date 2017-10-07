<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use \Dimsav\Translatable\Translatable;
    use FilterPaginateOrder;

    public static $language;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::$language = app()->getLocale();
    }

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'video'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'video', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => '',
            'video' => ''
        ];
    }

    public function related_event()
    {
        return $this->HasMany(RelatedEvent::class);
    }

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'picture');
    }

    public function getEvents()
    {
        return DB::table('events')
            ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
            ->where('event_translations.locale', '=', self::$language)
            ->get();
    }

    public function getEventsName()
    {
        return DB::table('events')
            ->select('event_id as id', 'event_translations.name')
            ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
            ->where('event_translations.locale', '=', self::$language)->get();
    }
}
