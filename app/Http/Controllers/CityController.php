<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\City;


class CityController extends Controller
{
    public function index()
    {

        return response()
            ->json([
                'model' => City::with('pictures')->FilterPaginateOrder()
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
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image',
            'cost' => 'required|numeric|min:0',
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/city', $name);

            }
        }else{
            $name = '';
        }

        $city = City::create([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'video' => $request->get('video')
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                if ($picture['picture']->isValid()) {
                    $name = $city->id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/city/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $city->id,
                    'picture_type' => 'city',
                    'link' => '/img/city/pictures/' . $name
                ]);
            }
        }

        $city->translateOrNew($language)->name = $request->get('name');
        $city->translateOrNew($language)->description = $request->get('description');

        $city->save();

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
        $language = app()->getLocale();


        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
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
            'video' => $request->get('video'),
            'picture' => $name
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {

                if ($picture['picture']->isValid()) {
                    $name = $id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/city/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $id,
                    'picture_type' => 'city',
                    'link' => '/img/city/pictures/' . $name
                ]);
            }
        }

        $city->translateOrNew($language)->name = $request->get('name');
        $city->translateOrNew($language)->description = $request->get('description');

        $city->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);

        Picture::wherePictureId($city->id)
            ->delete();

        $city->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
