<?php

namespace App\Http\Controllers;

use App\City;
use App\Event;
use Illuminate\Http\Request;
use App\RelatedEvent;
use Illuminate\Support\Facades\DB;

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
        $language = app()->getLocale();

        return response()
            ->json([
                'form' => RelatedEvent::initalize(),
                'option' => [
                    'cities' => DB::table('cities')
                        ->join('city_translations', 'cities.id', '=', 'city_translations.city_id')
                        ->where('city_translations.locale', '=', $language)
                        ->get(),
                    'events' => DB::table('events')
                        ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
                        ->where('event_translations.locale', '=', $language)
                        ->get()
                ]
            ]);
    }

    public function store(Request $request)
    {
//        event.*.event_id' => 'required|exists:events,id',
        $events = $request->get('event');
        $costs = $request->get('cost');
        $index = 0;
        if (is_array($events)) {
            $this->validate($request, [
                'city_id' => 'required|exists:cities,id',
                'event.*.event_id' => 'required|exists:events,id',
                'cost.*.cost' => 'required|numeric|min:0'
            ]);

            foreach ($events as $event) {

                $related_event = RelatedEvent::create([
                    'city_id' => $request->get('city_id'),
                    'event_id' => $event['event_id'],
                    'cost' => $costs[$index]['cost']
                ]);
                $index++;
            }
            return response()
                ->json([
                    'saved' => true
                ]);
        } else {
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

    }

    public function show($id)
    {
        $related_event = RelatedEvent::with('city', 'event')->findOrFail($id);

        return response()
            ->json([
                'model' => $related_event
            ]);
    }

    public function edit($id)
    {
        $related_event = RelatedEvent::findOrFail($id);

        $language = app()->getLocale();

        return response()
            ->json([
                'form' => $related_event,
                'option' => [
                    'cities' => DB::table('cities')
                        ->join('city_translations', 'cities.id', '=', 'city_translations.city_id')
                        ->where('city_translations.locale', '=', $language)
                        ->get(),
                    'events' => DB::table('events')
                        ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
                        ->where('event_translations.locale', '=', $language)
                        ->get()
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
