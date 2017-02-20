<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use App\Holiday;

class HolidayController extends Controller
{
    public function index()
    {

        return response()
            ->json([
                'model' => Holiday::with('pictures')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Holiday::initalize(),
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
            'sort' => 'required|numeric|min:1'
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/holiday', $name);

            }
        } else {
            $name = '';
        }

        $holiday = Holiday::create([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'video' => $request->get('video'),
            'sort' => $request->get('sort'),
        ]);

        $pictures = $request->file('pictures');


        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                if ($picture['picture']->isValid()) {
                    $name = $holiday->id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/holiday/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $holiday->id,
                    'picture_type' => 'holiday',
                    'link' => '/img/holiday/pictures/' . $name
                ]);
            }
        }

        $holiday->translateOrNew($language)->name = $request->get('name');
        $holiday->translateOrNew($language)->description = $request->get('description');

        $holiday->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $holiday = Holiday::findOrFail($id);

        return response()
            ->json([
                'model' => $holiday
            ]);
    }

    public function edit($id)
    {


        $holiday = Holiday::with('pictures')->findOrFail($id);
        return response()
            ->json([
                'form' => $holiday,
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
            'sort' => 'required|numeric|min:1'
        ]);

        $holiday = Holiday::findOrFail($id);

        $image = $request->file('picture');


        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/holiday', $name);

            }
        } else {
            $name = $holiday->picture;
        }


        $holiday->update([
            'cost' => $request->get('cost'),
            'picture' => $name,
            'video' => $request->get('video'),
            'sort' => $request->get('sort'),
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {

                if ($picture['picture']->isValid()) {
                    $name = $id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/holiday/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $id,
                    'picture_type' => 'holiday',
                    'link' => '/img/holiday/pictures/' . $name
                ]);
            }
        }

        $holiday->translateOrNew($language)->name = $request->get('name');
        $holiday->translateOrNew($language)->description = $request->get('description');

        $holiday->save();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);

        Picture::wherePictureId($holiday->id)
            ->delete();

        $holiday->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
