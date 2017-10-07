<?php

namespace App\Http\Controllers;

use App\City;
use App\Event;
use App\Holiday;
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
        $city = new City();
        $event = new Event();
        $holiday = new Holiday();
        return response()
            ->json([
                'form' => RelatedEvent::initalize(),
                'option' => [
                    'cities' => $city->getCities(),
                    'events' => $event->getEvents(),
                    'holidays' => $holiday->getHolidays(),
                ]
            ]);
    }

    public function GetNewEvent($cityId, $holidayId)
    {

        $language = app()->getLocale();

        $relatedEvent = new RelatedEvent();
        $event = new Event();

        $events = $event->getEvents();

        $relatedEvents = $relatedEvent->getRelatedEvents($cityId, $holidayId);

        //var_dump($related_events);
        $i = 0;
        // Поиск уже сохраненных Events и удаление их из массива
        foreach ($events as $event){
            foreach($relatedEvents as $relatedEvent){
                if ($event==$relatedEvent){
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

        $city = new City();
        $event = new Event();
        $holiday = new Holiday();

        return response()
            ->json([
                'form' => $related_event,
                'option' => [
                    'cities' => $city->getCities(),
                    'events' => $event->getEvents(),
                    'holidays' => $holiday->getHolidays(),
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
