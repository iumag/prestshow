<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Photographer;

class PhotographerController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Photographer::with('pictures')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Photographer::initalize(),
                'option' => []
            ]);
    }

    public function store(Request $request)
    {
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image',
            'cost' => 'required|numeric|min:0'
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
            'video' => $request->get('video')
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

        $photographer = Photographer::findOrFail($id);

        return response()
            ->json([
                'form' => $photographer,
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
            'video' => $request->get('video')
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
