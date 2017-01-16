<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Event::filterPaginateOrder()
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
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'description' => 'required',
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
            'name' => $request->get('name'),
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
        $event = Event::findOrFail($id);

        return response()
            ->json([
                'model' => $event
            ]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return response()
            ->json([
                'form' => $event,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'description' => 'required',
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
            'name' => $request->get('name'),
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
        $event = Event::findOrFail($id);

        $event->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
