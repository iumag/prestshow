<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Transport extends Model
{
    use FilterPaginateOrder;

    protected $fillable = [
        'transport', 'picture', 'description',  'cost'
    ];

    protected $filter = [
        'id', 'transport', 'picture', 'description', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'transport' => '',
            'picture' => '',
            'description' => '',
            'cost' => ''
        ];
    }
}
