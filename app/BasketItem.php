<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    protected $fillable = [
        'entity_id', 'entity_type'
    ];

    protected $filter = [
        'id', 'entity_id', 'entity_type', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'entity_id' => 'Select',
            'entity_type' => 'Select'
        ];
    }

    public function entity()
    {
        return $this->morphTo();
    }
}
