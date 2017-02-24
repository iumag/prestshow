<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Photographer;
use Illuminate\Support\Facades\DB;

class PhotographerController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Photographer::with('pictures')->with('city')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        $language = app()->getLocale();

        return response()
            ->json([
                'form' => Photographer::initalize(),
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
            'cost' => 'required|numeric|min:0',
            'city_id' => 'required|exists:cities,id',
            'sort' => 'required|numeric|min:1'
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/photographer', $name);

            }
        } else {
            $name = '';
        }

        $photographer = Photographer::create([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'city_id' => $request->get('city_id'),
            'video' => $request->get('video'),
            'sort' => $request->get('sort'),
        ]);

        $pictures = $request->file('pictures');


        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                if ($picture['picture']->isValid()) {
                    $name = $photographer->id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/photographer/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $photographer->id,
                    'picture_type' => 'photographer',
                    'link' => '/img/photographer/pictures/' . $name
                ]);
            }
        }

        $photographer->translateOrNew($language)->name = $request->get('name');
        $photographer->translateOrNew($language)->description = $request->get('description');

        $photographer->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $photographer = Photographer::findOrFail($id);

        return response()
            ->json([
                'model' => $photographer
            ]);
    }

    public function edit($id)
    {

        $photographer = Photographer::with('pictures')->findOrFail($id);

        $language = app()->getLocale();

        return response()
            ->json([
                'form' => $photographer,
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
            'cost' => 'required|numeric|min:0',
            'city_id' => 'required|exists:cities,id',
            'sort' => 'required|numeric|min:1'
        ]);

        $image = $request->file('picture');

        $photographer = Photographer::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/photographer', $name);
            }
        } else {
            $name = $photographer->picture;
        }

        $photographer->update([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'city_id' => $request->get('city_id'),
            'video' => $request->get('video'),
            'sort' => $request->get('sort'),
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {

                if ($picture['picture']->isValid()) {
                    $name = $id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/photographer/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $id,
                    'picture_type' => 'photographer',
                    'link' => '/img/photographer/pictures/' . $name
                ]);
            }
        }

        $photographer->translateOrNew($language)->name = $request->get('name');
        $photographer->translateOrNew($language)->description = $request->get('description');

        $photographer->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $photographer = Photographer::findOrFail($id);

        Picture::wherePictureId($photographer->id)
            ->delete();

        $photographer->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
