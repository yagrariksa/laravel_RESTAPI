<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $data = Store::get();
        return response()->json([
            'message'   => 'Get All Store Data',
            'body'      => StoreResource::collection($data)
        ], 200);
    }

    public function find(Request $request)
    {
        $start_lat = $request->query('startlat');
        $end_lat = $request->query('endlat');
        $start_long = $request->query('startlong');
        $end_long = $request->query('endlong');

        if (!$start_lat || !$start_long || !$end_lat || !$end_long) {
            return response()->json([
                'message' => "query params are required start and end for both latitude and longtitude"
            ], 400);
        }

        $data = Store::with('visitor')->whereBetween('lat', [$start_lat, $end_lat])
            ->whereBetween('long', [$start_long, $end_long])->get();

        if (!$data) {
            return response()->json([
                'message' => "No data in location",
                'body'    => null
            ], 404);
        }

        return response()->json([
            'message'   => "Success get " . sizeof($data) . " store in location",
            'body'      => StoreResource::collection($data)
        ], 200);
    }

    public function coordinate(Request $request)
    {
        $lat = $request->query('lat');
        $long = $request->query('long');

        if (!$lat || !$long) {
            return response()->json([
                'message' => "query params are required latitude and longtitude"
            ], 400);
        }

        $data = Store::with('visitor')->where('lat', $lat)
            ->where('long', $long)->first();

        if (!$data) {
            return response()->json([
                'message' => "Data not found",
                'body'    => null
            ], 404);
        }

        return response()->json([
            'message'   => "Success get store",
            'body'      => new StoreResource($data)
        ], 200);
    }

    public function findOne($id)
    {
        $data = Store::with('visitor')->find($id);

        if (!$data) {
            return response()->json([
                'message' => "Data not found",
                'body'    => null
            ], 404);
        }
        return response()->json([
            'message'   => "Success get store",
            'body'      => new StoreResource($data)
        ], 200);
    }
}
