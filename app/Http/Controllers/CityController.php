<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => City::FilterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => City::initalize(),
                'option' => []
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $city = City::create($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $city = City::findOrFail($id);

        return response()
            ->json([
                'model' => $city
            ]);
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        return response()
            ->json([
                'form' => $city,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
