<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class City extends Model
{
    use FilterPaginateOrder;

    protected $fillable = [
        'city', 'picture', 'description', 'cost'
    ];

    protected $filter = [
        'id', 'city', 'picture', 'description', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'city' => '',
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
}
