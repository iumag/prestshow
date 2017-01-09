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
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0'
        ]);

        $holiday = Holiday::create($request->all());

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
                'model' => $holiday,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $holiday = Holiday::findOrFail($id);
        $holiday->update($request->all());

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
