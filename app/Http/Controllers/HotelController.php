<?php

namespace App\Http\Controllers;

use App\City;
use App\Picture;
use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index()
    {

        return response()
            ->json([
                'model' => Hotel::with('city')->with('pictures')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        $language = app()->getLocale();


        return response()
            ->json([
                'form' => Hotel::initalize(),
                'option' => [
                    'cities' => DB::table('cities')
                        ->join('city_translations', 'cities.id', '=', 'city_translations.city_id')
                        ->where('city_translations.locale','=',$language)
                        ->get()
                ]
            ]);
    }

    public function store(Request $request)
    {
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image',
            'city_id' => 'required|exists:cities,id',
            'cost' => 'required|numeric|min:0',
            'sort' => 'required|numeric|min:1'
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/hotel', $name);

            }
        } else {
            $name = '';
        }

        $hotel = Hotel::create([
            'cost' => $request->get('cost'),
            'city_id' => $request->get('city_id'),
            'picture' => $name,
            'video' => $request->get('video'),
            'sort' => $request->get('sort'),
        ]);

        $pictures = $request->file('pictures');


        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                if ($picture['picture']->isValid()) {
                    $name = $hotel->id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/hotel/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $hotel->id,
                    'picture_type' => 'hotel',
                    'link' => '/img/hotel/pictures/' . $name
                ]);
            }
        }

        $hotel->translateOrNew($language)->name = $request->get('name');
        $hotel->translateOrNew($language)->description = $request->get('description');

        $hotel->save();

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

        $hotel = Hotel::with('pictures')->findOrFail($id);

        $language = app()->getLocale();

        return response()
            ->json([
                'form' => $hotel,
                'option' => [
                    'cities' => DB::table('cities')
                        ->join('city_translations', 'cities.id', '=', 'city_translations.city_id')
                        ->where('city_translations.locale','=',$language)
                        ->get()
                ]
            ]);
    }

    public function update(Request $request, $id)
    {
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'city_id' => 'required|exists:cities,id',
            'cost' => 'required|numeric|min:0',
            'sort' => 'required|numeric|min:1'
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
            'cost' => $request->get('cost'),
            'city_id' => $request->get('city_id'),
            'picture' => $name,
            'video' => $request->get('video'),
            'sort' => $request->get('sort'),
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {

                if ($picture['picture']->isValid()) {
                    $name = $id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/hotel/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $id,
                    'picture_type' => 'hotel',
                    'link' => '/img/hotel/pictures/' . $name
                ]);
            }
        }

        $hotel->translateOrNew($language)->name = $request->get('name');
        $hotel->translateOrNew($language)->description = $request->get('description');

        $hotel->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        Picture::wherePictureId($hotel->id)
            ->delete();

        $hotel->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
