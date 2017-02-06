<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;

class TransportController extends Controller
{
    public function index()
    {
        return response()
            ->json([
                'model' => Transport::filterPaginateOrder()
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' => Transport::initalize(),
                'option' => []
            ]);
    }

    public function store(Request $request)
    {
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

                $image->move('../public/img/transport', $name);

            }
        } else {
            $name = '';
        }

        $transport = Transport::create([
            'name' => $request->get('name'),
            'cost' => $request->get('cost'),
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
        $transport = Transport::findOrFail($id);

        return response()
            ->json([
                'model' => $transport
            ]);
    }

    public function edit($id)
    {
        $transport = Transport::findOrFail($id);

        return response()
            ->json([
                'form' => $transport,
                'option' => ''
            ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'picture' => 'required|image',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $image = $request->file('picture');

        $transport = Transport::findOrFail($id);

        if (isset($image)) {
            if ($image->isValid()) {

                $name = $image->getClientOriginalName();

                $image->move('../public/img/transport', $name);
            }
        } else {
            $name = $transport->picture;
        }

        $transport->update([
            'name' => $request->get('name'),
            'cost' => $request->get('cost'),
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
        $transport = Transport::findOrFail($id);

        $transport->delete();

        return response()
            ->json([
                'deleted' => true
            ]);
    }
}
