<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;
use Illuminate\Support\Facades\DB;

class City extends Model
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

    public function getCities()
    {
        return DB::table('cities')
            ->join('city_translations', 'cities.id', '=', 'city_translations.city_id')
            ->where('city_translations.locale', '=', self::$language)
            ->get();
    }
}
