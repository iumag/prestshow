<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    protected $fillable = ['name', 'description'];

    public $timestamps = false;

}
