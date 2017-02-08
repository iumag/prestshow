<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotographerTranslation extends Model
{
    protected $fillable = ['name', 'description'];

    public $timestamps = false;
}
