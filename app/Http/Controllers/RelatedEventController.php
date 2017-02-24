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
                'model' => RelatedEvent::with('city', 'event.pictures', 'holiday')->filterPaginateOrder()
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
                        ->get(),
                    'holidays' => DB::table('holidays')
                        ->join('holiday_translations', 'holidays.id', '=', 'holiday_translations.holiday_id')
                        ->where('holiday_translations.locale', '=', $language)
                        ->get(),
                ]
            ]);
    }

    public function GetNewEvent($city_id, $holiday_id)
    {

        $language = app()->getLocale();

        $new_events = array();

        $events = DB::table('events')
            ->select('event_id as id', 'event_translations.name')
            ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
            ->where('event_translations.locale', '=', $language)->get();

        $related_events = DB::table('events')
            ->select('events.id', 'event_translations.name')
            ->join('event_translations', 'events.id', '=', 'event_translations.event_id')
            ->join('related_events', 'events.id', '=', 'related_events.event_id')
            ->where('event_translations.locale', '=', $language)
            ->where('city_id', $city_id)
            ->where('holiday_id', $holiday_id)
            //->unionAll($events)
            ->get();

        //var_dump($related_events);
        $i = 0;
        // Поиск уже сохраненных Events и удаление их из массива
        foreach ($events as $event){
            foreach($related_events as $related_event){
                if ($event==$related_event){
                    unset($events[$i]);
                    break;
                }
            }
            $i++;
        }

        return response()
            ->json([
                'new_events' => $events
            ]);
    }

    public function store(Request $request)
    {
//        event.*.event_id' => 'required|exists:events,id',
        $events = $request->get('event');
        $costs = $request->get('cost');
        $sorts = $request->get('sort');
        $index = 0;
        if (is_array($events)) {
            $this->validate($request, [
                'city_id' => 'required|exists:cities,id',
                'holiday_id' => 'required|exists:holidays,id',
                'event.*.event_id' => 'required|exists:events,id',
                'cost.*.cost' => 'required|numeric|min:0',
                'sort.*.sort' => 'required|numeric|min:1'
            ]);

            foreach ($events as $event) {

                $related_event = RelatedEvent::create([
                    'city_id' => $request->get('city_id'),
                    'holiday_id' => $request->get('holiday_id'),
                    'event_id' => $event['event_id'],
                    'cost' => $costs[$index]['cost'],
                    'sort' => $sorts[$index]['sort']
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
                'cost' => 'required|numeric|min:0',
                'sort' => 'required|numeric|min:1'
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
                        ->get(),
                    'holidays' => DB::table('holidays')
                        ->join('holiday_translations', 'holidays.id', '=', 'holiday_translations.holiday_id')
                        ->where('holiday_translations.locale', '=', $language)
                        ->get(),
                ]
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'city_id' => 'required|exists:cities,id',
            'event_id' => 'required|exists:events,id',
            'holiday_id' => 'required|exists:holidays,id',
            'cost' => 'required|numeric|min:0',
            'sort' => 'required|numeric|min:1'
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
