<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'long' => 'required',
            'name' => 'required',
        ]);

        $data = Store::create([
            'lat' => $request->lat,
            'long' => $request->long,
            'name_store' => $request->name,
        ]);

        return redirect()->route('store.index')->with('success', 'Success add new data');
    }

    public function show($id)
    {
        $data = Store::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data not found');
        }

        return view('store.detail', [
            'store' => $data,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = Store::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data not found');
        }

        if ($request->lat) {
            $data->lat = $request->lat;
        }

        if ($request->long) {
            $data->long = $request->long;
        }
        if ($request->name) {
            $data->store_name = $request->name;
        }

        $data->save();
        return redirect()->route('store.detail', $data->id)->with('success', 'Success update');
    }

    public function destroy($id)
    {
        //
    }
}
