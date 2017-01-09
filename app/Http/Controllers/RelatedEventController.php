<?php

namespace App\Http\Controllers;

use App\City;
use App\Event;
use Illuminate\Http\Request;
use App\RelatedEvent;

class RelatedEventController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => RelatedEvent::with('city', 'event')->filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => RelatedEvent::initalize(),
                'option' => [
                    'cities' => City::orderBy('city')->get(),
                    'events' => Event::orderBy('event')->get()
                ]
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'city_id' => 'required|exists:cities,id',
            'event_id' => 'required|exists:events,id',
            'cost' => 'required|numeric|min:0'
        ]);

        $related_event = RelatedEvent::create($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $related_event = RelatedEvent::findOrFail($id);

        return response()
            ->json([
                'model' => $related_event
            ]);
    }

    public function edit($id)
    {
        $related_event = RelatedEvent::findOrFail($id);

        return response()
            ->json([
                'model' => $related_event,
                'option' => [
                    'cities' => City::orderBy('city')->get(),
                    'events' => Event::orderBy('event')->get()
                ]
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'city_id' => 'required|exists:cities,id',
            'event_id' => 'required|exists:events,id',
            'cost' => 'required|numeric|min:0'
        ]);

        $related_event = RelatedEvent::findOrFail($id);
        $related_event->update($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $related_event = RelatedEvent::findOrFail($id);

        $related_event->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
