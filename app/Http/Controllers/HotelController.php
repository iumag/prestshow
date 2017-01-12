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
                    'cities' => City::orderBy('city')->get()
                ]
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hotel' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cost' => 'required|numeric|min:0'
        ]);

        $hotel = Hotel::create($request->all());

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
                    'cities' => City::orderBy('city')->get()
                ]
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hotel' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cost' => 'required|numeric|min:0'
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

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
