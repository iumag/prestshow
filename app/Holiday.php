<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Holiday extends Model
{
    use FilterPaginateOrder;

    protected $fillable = [
        'name', 'picture', 'description', 'cost'
    ];

    protected $filter = [
        'id', 'name', 'picture', 'description', 'cost', 'created_at'
    ];

    public static function initalize()
    {
        return [
            'name' => '',
            'picture' => '',
            'description' => '',
            'cost' => ''
        ];
    }
}
