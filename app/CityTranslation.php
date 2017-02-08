<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    protected $fillable = ['name', 'description'];

    public $timestamps = false;
}
