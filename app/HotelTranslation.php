<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    protected $fillable = ['name', 'description'];

    public $timestamps = false;
}
