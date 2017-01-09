<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photographer;

class PhotographerController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Photographer::filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Photographer::initalize(),
                'option' => []
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photographer' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0'
        ]);

        $photographer = Photographer::create($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function show($id)
    {
        $photographer = Photographer::findOrFail($id);

        return response()
            ->json([
                'model' => $photographer
            ]);
    }

    public function edit($id)
    {
        $photographer = Photographer::findOrFail($id);

        return response()
            ->json([
                'model' => $photographer,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'photographer' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $photographer = Photographer::findOrFail($id);
        $photographer->update($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function destroy($id)
    {
        $photographer = Photographer::findOrFail($id);

        $photographer->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
