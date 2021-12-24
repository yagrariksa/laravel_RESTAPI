<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::where('user_id', Auth::user()->id)->get();
        // $data = Produk::get();
        return view('produk.index', [
            'produks' => $data,
        ]);
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $data = Produk::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => Auth::user()->id
        ]);

        if ($request->pict) {
            $nameimg = time() . "." . $request->pict->extension();
            $request->pict->storeAs('public', $nameimg);

            $data->pict = url('storage/' . $nameimg);
            $data->save();
        }

        return redirect()->route('produk.index')->with('success', 'Berhasil menambahkan produk baru');
    }

    public function edit($id)
    {
        $data = Produk::find($id);

        if (!$data) {
            return redirect()->route('produk.index')->with('error', 'Not Found produk with id ' . $id);
        }

        return view('produk.edit', [
            'produk' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        
        $data = Produk::find($id);

        if (!$data) {
            return redirect()->route('produk.index')->with('error', 'Not Found produk with id ' . $id);
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

        return redirect()->route('produk.index')->with('success', 'Success update data produk with id ' . $id);
    }

    public function destroy($id)
    {
        $data = Produk::find($id);

        if (!$data) {
            return redirect()->route('produk.index')->with('error', 'Not Found produk with id ' . $id);
        }

        $data->delete();

        return redirect()->route('produk.index')->with('success', 'Success Delete data produk with id ' . $id);
    }
}
