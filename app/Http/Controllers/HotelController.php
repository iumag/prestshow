<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Hotel::with('city')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Hotel::initalize(),
                'option' => [
                    'cities' => City::orderBy('name')->get()
                ]
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cost' => 'required|numeric|min:0'
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/hotel', $name);

            }
        }else{
            $name = '';
        }

        $hotel = Hotel::create([
            'name' => $request->get('name'),
            'cost' => $request->get('cost'),
            'city_id' => $request->get('city_id'),
            'description' => $request->get('description'),
            'picture' => $name
        ]);

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);

        return response()
            ->json([
                'model' => $hotel
            ]);
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return response()
            ->json([
                'form' => $hotel,
                'option' => [
                    'cities' => City::orderBy('name')->get()
                ]
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cost' => 'required|numeric|min:0'
        ]);

        $image = $request->file('picture');

        $hotel = Hotel::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/hotel', $name);
            }
        } else {
            $name = $hotel->picture;
        }

        $hotel->update([
            'name' => $request->get('name'),
            'cost' => $request->get('cost'),
            'city_id' => $request->get('city_id'),
            'description' => $request->get('description'),
            'picture' => $name
        ]);

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
