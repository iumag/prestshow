<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BasketItem;
use App\City;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $basket = Basket::with('items.entity')->FilterPaginateOrder();
        $entity_array = 0;
        $cost_array = array();
        foreach($basket->items() as $items){
            foreach($items->items as $item) {
                $entity = BasketItem::find($item->id);
                $entity_array += $entity->entity->cost;
            }
            array_push($cost_array,$entity_array);
            $entity_array = 0;
        }
        return response()
            ->json([
                'model' => Basket::with('items.entity')->FilterPaginateOrder(),
                'cost' => $cost_array
            ]);
    }

    public function store()
    {

    }

    public function show($id)
    {
        $basket = Basket::with('items.entity')->findOrFail($id);
        dd($basket);
        foreach($basket->items as $item){
            $entity = BasketItem::find($item->id);
            $entity_array[] = $entity->entity;
        }

        dd($entity_array);

        return response()
            ->json([
                'form' => $basket,
                'option' => ''
            ]);
    }
}
