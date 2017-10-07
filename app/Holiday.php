<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;
use Illuminate\Support\Facades\DB;

class Holiday extends Model
{
    use FilterPaginateOrder;
    use \Dimsav\Translatable\Translatable;

    public static $language;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::$language = app()->getLocale();
    }

    public $translatedAttributes = ['name', 'description'];

    protected $fillable = [
        'name', 'picture', 'description', 'cost', 'video', 'sort', 'picture_app'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at', 'video', 'sort', 'picture_app'
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

    public function getHolidays()
    {
        return DB::table('holidays')
            ->join('holiday_translations', 'holidays.id', '=', 'holiday_translations.holiday_id')
            ->where('holiday_translations.locale', '=', self::$language)
            ->get();
    }
}
