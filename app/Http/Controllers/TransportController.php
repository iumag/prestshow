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
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0'
        ]);

        $transport = Transport::create($request->all());

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
            'picture' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|min:0',
        ]);

        $transport = Transport::findOrFail($id);
        $transport->update($request->all());

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
