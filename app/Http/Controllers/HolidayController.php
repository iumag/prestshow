<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;

class HolidayController extends Controller
{
    public function index()
    {

        return response()
            ->json([
                'model' => Holiday::filterPaginateOrder()
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
            'picture' => $name
        ]);

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


        $holiday = Holiday::findOrFail($id);
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
            'picture' => $name
        ]);

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

        $holiday->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
