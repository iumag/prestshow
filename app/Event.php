<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Event extends Model
{
    use \Dimsav\Translatable\Translatable;
    use FilterPaginateOrder;

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
}
