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
            'picture' => 'required|image',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $image = $request->file('picture');

        if ($image->isValid()) {

            $name = $image->getClientOriginalName();

            $image->move('../public/img/city', $name);

        }

        $city = City::create([
            'name' => $request->get('name'),
            'cost' => $request->get('cost'),
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
            'picture' => 'image',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $image = $request->file('picture');

        $city = City::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/city', $name);
            }
        } else {
            $name = $city->picture;
        }

        $city->update([
            'name' => $request->get('name'),
            'cost' => $request->get('cost'),
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
        $city = City::findOrFail($id);

        $city->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
