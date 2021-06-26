<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BajuResource;
use App\Models\Baju;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Baju::get();
        

        if (sizeof($data) == 0) {
            return response()->json([
                'message'   => 'data not found',
                'data'      => [],
            ], 404);
        }

        foreach($data as $d){
            $d['details'] = route('baju.details', $d->id);
        }
        return response()->json([
            'message'   => 'success',
            'data'      => BajuResource::collection($data),
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
        return response()->json([
            'name' => $request->name,
            'token' => $request->bearerToken(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Baju::find($id);

        if(!$data) {
            return response()->json([
                'message'   => 'data not found',
                'data'      => null,
            ], 404);
        }

        return response()->json([
            'message'   => 'success',
            'data'      => new BajuResource($data),
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
