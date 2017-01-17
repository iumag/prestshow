<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BasketItem;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function index()
    {
        $basket = Basket::with('items.entity')->FilterPaginateOrder();
        $cost = 0;
        $cost_array = array();
        foreach ($basket->items() as $items) {
            foreach ($items->items as $item) {
                $entity = BasketItem::find($item->id);
                $cost += $entity->entity->cost;
            }
            array_push($cost_array, $cost);
            $cost = 0;
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
        $index = 0;

        foreach ($basket->items as $item) {
            if ($item->entity_type == 'related_event') {
                $idevent = $basket->items[$index]->entity->event_id;
                break;
            }
            $index++;
        }


        return response()
            ->json([
                'model' => $basket,
                'event' => DB::table('events')->select('name')->where('id', '=', $idevent)->get(),
                'option' => ''
            ]);
    }

    public function destroy($id)
    {
        $basket = Basket::findOrFail($id);

        BasketItem::whereBasketId($basket->id)
            ->delete();

        $basket->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
