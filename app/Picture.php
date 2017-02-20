<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'picture_id', 'picture_type', 'link', 'sort'
    ];

    protected $filter = [
        'id', 'picture_id', 'picture_type', 'created_at', 'link', 'sort'
    ];

    public function picture()
    {
        return $this->morphTo();
    }
}
