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
        $language = app()->getLocale();

        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image',
            'description' => 'required',
            'cost' => 'required|numeric|min:0'
        ]);

        $image = $request->file('picture');

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/photographer', $name);

            }
        } else {
            $name = '';
        }

        $photographer = Photographer::create([
            'cost' => $request->get('cost'),
            'picture' => $name
        ]);

        $photographer->translateOrNew($language)->name = $request->get('name');
        $photographer->translateOrNew($language)->description = $request->get('description');

        $photographer->save();

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
                'form' => $photographer,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $language = app()->getLocale();


        $this->validate($request, [
            'name' => 'required',
            'picture' => 'image',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $image = $request->file('picture');

        $photographer = Photographer::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/photographer', $name);
            }
        } else {
            $name = $photographer->picture;
        }

        $photographer->update([
            'cost' => $request->get('cost'),
            'picture' => $name
        ]);

        $photographer->translateOrNew($language)->name = $request->get('name');
        $photographer->translateOrNew($language)->description = $request->get('description');

        $photographer->save();

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
