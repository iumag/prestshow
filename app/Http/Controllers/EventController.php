<?php

namespace App\Http\Controllers;

use App\Picture;
use ClassPreloader\Config;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Event::with('pictures')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Event::initalize(),
                'option' => []
            ]);
    }

    public function store(Request $request)
    {
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image',
            'pictures.*.picture' => 'image'
        ]);


        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/event', $name);

            }
        } else {
            $name = '';
        }

        $event = Event::create([
            'picture' => $name,
            'video' => $request->get('video')
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {
                if ($picture['picture']->isValid()) {
                    $name = $event->id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/event/pictures', $name);
                }

                Picture::create([
                    'picture_id' => $event->id,
                    'picture_type' => 'event',
                    'link' => '/img/event/pictures/' . $name
                ]);
            }
        }


        $event->translateOrNew($language)->name = $request->get('name');
        $event->translateOrNew($language)->description = $request->get('description');

        $event->save();


        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return response()
            ->json([
                'model' => $event
            ]);
    }

    public function edit($id)
    {

        $event = Event::with('pictures')->findOrFail($id);
        return response()
            ->json([
                'form' => $event,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'pictures.*.picture' => 'image'
        ]);

        $image = $request->file('picture');

        $event = Event::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/event', $name);
            }
        } else {
            $name = $event->picture;
        }


        $event->update([
            'picture' => $name,
            'video' => $request->get('video')
        ]);

        $pictures = $request->file('pictures');

        if (isset($pictures)) {
            foreach ($pictures as $picture) {

                if ($picture['picture']->isValid()) {
                    $name = $id . '_' . date('dmY') . '_' . $picture['picture']->getClientOriginalName();
                    $picture['picture']->move('../public/img/event/pictures', $name);


                    Picture::create([
                        'picture_id' => $id,
                        'picture_type' => 'event',
                        'link' => '/img/event/pictures/' . $name
                    ]);
                }
            }
        }


        $event->translateOrNew($language)->name = $request->get('name');
        $event->translateOrNew($language)->description = $request->get('description');

        $event->update();

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        Picture::wherePictureId($event->id)
            ->delete();

        $event->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
