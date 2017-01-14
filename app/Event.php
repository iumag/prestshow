<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Event extends Model
{

    use FilterPaginateOrder;

    protected $fillable = [
        'name', 'picture', 'description'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => ''
        ];
    }

    public function related_event()
    {
        return $this->HasMany(RelatedEvent::class);
    }
}
