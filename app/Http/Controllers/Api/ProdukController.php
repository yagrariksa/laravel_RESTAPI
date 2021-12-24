<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user()->products;

        if (sizeof($data) == 0) {
            return response()->json([
                'message'   => 'data not found',
                'data'      => [],
            ], 404);
        }

        return response()->json([
            'message'   => 'Success GET all produk data',
            'size'      => sizeof($data),
            'data'      => ProdukResource::collection($data),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->name | !$request->price) {
            return response()->json([
                'message'   => 'name and price are required'
            ], 409);
        }

        $extramsg = ' && ';
        if($request->hasFile('img')){
            $extramsg .= 'has File';
        }else{
            $extramsg .= 'doesn\'t have File';
        }

        $data = Produk::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => Auth::user()->id,
        ]);

        if ($request->pict) {
            $nameimg = time() . "." . $request->pict->extension();
            $request->pict->storeAs('public', $nameimg);

            $data->pict = url('storage/' . $nameimg);
            $data->save();
        }

        return response()->json([
            'message' => 'Success created data' . $extramsg,
            'data'    => new ProdukResource($data),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produk::find($id);

        if (!$data) {
            return response()->json([
                'message'   => 'data not found',
                'data'      => null,
            ], 404);
        }

        return response()->json([
            'message'   => 'success',
            'data'      => new ProdukResource($data),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Produk::find($id);

        if (!$data) {
            return response()->json([
                'message'   => 'data not found',
                'data'      => null,
            ], 404);
        }

        if ($request->name) {
            $data->name = $request->name;
        }

        if ($request->price) {
            $data->price = $request->price;
        }

        if ($request->pict) {
            $nameimg = time() . "." . $request->pict->extension();
            $request->pict->storeAs('public', $nameimg);

            $data->pict = url('storage/' . $nameimg);
        }

        $data->save();

        return response()->json([
            'message'   => 'Success Update Data',
            'data'      => new ProdukResource($data),
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::find($id);

        if (!$data) {
            return response()->json([
                'message'   => 'data not found',
                'data'      => null,
            ], 404);
        }

        $data->delete();

        return response()->json([
            'message'   => 'Success Delete Data',
        ], 202);
    }
}
