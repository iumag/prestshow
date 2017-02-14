<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Transport;
use Illuminate\Support\Facades\DB;

class TransportController extends Controller
{
    public function index()
    {

        return response()
            ->json([
                'model' => Transport::with('pictures')->with('city')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        $language = app()->getLocale();

        return response()
            ->json([
                'form' => Transport::initalize(),
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
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/transport', $name);

            }
        } else {
            $name = '';
        }

        $transport = Transport::create([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'video' => $request->get('video'),
            'city_id' => $request->get('city_id')
        ]);

        $pictures = $request->file('pictures');


        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                if ($picture['picture']->isValid()) {
                    $name = $transport->id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/transport/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $transport->id,
                    'picture_type' => 'transport',
                    'link' => '/img/transport/pictures/' . $name
                ]);
            }
        }

        $transport->translateOrNew($language)->name = $request->get('name');
        $transport->translateOrNew($language)->description = $request->get('description');

        $transport->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $transport = Transport::findOrFail($id);

        return response()
            ->json([
                'model' => $transport
            ]);
    }

    public function edit($id)
    {
        $language = app()->getLocale();

        $transport = Transport::findOrFail($id);

        return response()
            ->json([
                'form' => $transport,
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
        ]);

        $image = $request->file('picture');

        $transport = Transport::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/transport', $name);
            }
        } else {
            $name = $transport->picture;
        }

        $transport->update([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'video' => $request->get('video'),
            'city_id' => $request->get('city_id'),
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {

                if ($picture['picture']->isValid()) {
                    $name = $id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/transport/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $id,
                    'picture_type' => 'transport',
                    'link' => '/img/transport/pictures/' . $name
                ]);
            }
        }

        $transport->translateOrNew($language)->name = $request->get('name');
        $transport->translateOrNew($language)->description = $request->get('description');

        $transport->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $transport = Transport::findOrFail($id);

        Picture::wherePictureId($transport->id)
            ->delete();

        $transport->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
