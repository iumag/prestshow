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
            'event' => 'required',
            'picture' => 'required',
            'description' => 'required',
        ]);

        $event = Event::create($request->all());

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
                'model' => $event,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event' => 'required',
            'picture' => 'required',
            'description' => 'required',
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
        $event = Event::findOrFail($id);

        $event->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
