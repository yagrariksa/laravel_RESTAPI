<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;

class BajuController extends Controller
{
    public function index()
    {
        $data = Baju::get();
        return view('baju.index', [
            'bajus' => $data,
        ]);
    }

    public function create()
    {
        return view('baju.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $data = Baju::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        if ($request->pict) {
            $nameimg = time() . "." . $request->pict->extension();
            $request->pict->storeAs('public', $nameimg);

            $data->pict = url('storage/' . $nameimg);
            $data->save();
        }

        return redirect()->route('baju.index')->with('success', 'Berhasil menambahkan baju baru');
    }

    public function edit($id)
    {
        $data = Baju::find($id);

        if (!$data) {
            return redirect()->route('baju.index')->with('error', 'Not Found Baju with id ' . $id);
        }

        return view('baju.edit', [
            'baju' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        
        $data = Baju::find($id);

        if (!$data) {
            return redirect()->route('baju.index')->with('error', 'Not Found Baju with id ' . $id);
        }

        if ($request->name != $data->name) {
            $data->name = $request->name;
        }

        if ($request->price != $data->price) {
            $data->price = $request->price;
        }

        if ($request->pict) {
            $nameimg = time() . "." . $request->pict->extension();
            $request->pict->storeAs('public', $nameimg);

            $data->pict = url('storage/' . $nameimg);
        }

        $data->save();

        return redirect()->route('baju.index')->with('success', 'Success update data baju with id ' . $id);
    }

    public function destroy($id)
    {
        $data = Baju::find($id);

        if (!$data) {
            return redirect()->route('baju.index')->with('error', 'Not Found Baju with id ' . $id);
        }

        $data->delete();

        return redirect()->route('baju.index')->with('success', 'Success Delete data baju with id ' . $id);
    }
}
