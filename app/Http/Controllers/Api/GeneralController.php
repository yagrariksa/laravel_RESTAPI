<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'success get all route for REST API',
            'data'      => [
                'general' => [
                    'index'  => [
                        'type'  => 'GET',
                        'url'   => route('api.index'),
                        'desc'  => 'Get All Route for REST API in this Server'
                    ],
                    'token' => [
                        'type'  => 'GET',
                        'url'   => route('get.token'),
                        'desc'  => 'Get TOKEN first user in DB for debugging'
                    ]
                ],
                'auth' => [
                    'login' => [
                        'type'  => 'POST',
                        'url'   => route('api.login'),
                        'desc'  => ''
                    ],
                    'signup' => [
                        'type'  => 'POST',
                        'url'   => route('api.signup'),
                        'desc'  => ''
                    ],
                ],
                'public' => [
                    'index' => [
                        'type'  => 'GET',
                        'url'   => route('public.produk.index'),
                        'desc'  => 'Get All Produk Data'
                    ],
                    'store' => [
                        'type'  => 'POST',
                        'url'   => route('public.produk.store'),
                        'desc'  => 'Store Produk Data (body:: name: String, price: Int, pict: Image)',
                    ],
                    'details' => [
                        'type'  => 'GET',
                        'url'   => route('public.produk.details', 'id'),
                        'desc'  => 'Get Produk Data with spesific id'
                    ],
                    'update' => [
                        'type'  => 'POST',
                        'url'   => route('public.produk.update', 'id'),
                        'desc'  => 'Update Produk Data with spesific id'
                    ],
                    'delete' => [
                        'type'  => 'DELETE',
                        'url'   => route('public.produk.delete', 'id'),
                        'desc'  => 'Delete Produk Data with spesific id'
                    ],
                ],
                'private' => [
                    'index' => [
                        'type'  => 'GET',
                        'url'   => route('private.produk.index'),
                        'desc'  => 'Get All Produk Data [use Bearer token at Header Authorization]'
                    ],
                    'store' => [
                        'type'  => 'POST',
                        'url'   => route('private.produk.store'),
                        'desc'  => 'Store Produk Data (body:: name: String, price: Int, pict: Image) [use Bearer token at Header Authorization]'
                    ],
                    'details' => [
                        'type'  => 'GET',
                        'url'   => route('private.produk.details', 'id'),
                        'desc'  => 'Get Produk Data with spesific id [use Bearer token at Header Authorization]'
                    ],
                    'update' => [
                        'type'  => 'POST',
                        'url'   => route('private.produk.update', 'id'),
                        'desc'  => 'Update Produk Data with spesific id [use Bearer token at Header Authorization]'
                    ],
                    'delete' => [
                        'type'  => 'DELETE',
                        'url'   => route('private.produk.delete', 'id'),
                        'desc'  => 'Delete Produk Data with spesific id [use Bearer token at Header Authorization]'
                    ],
                ]
            ]
        ], 200);
    }

    public function login(Request $request)
    {
        if (!$request->email || !$request->password) {
            return response()->json([
                'message'   => 'Email and Password are required'
            ], 409);
        }

        $data = User::where('email', $request->email)->first();
        if (!$data) {
            return response()->json([
                'message'   => 'your email or password is wrong'
            ], 409);
        }

        if (Hash::check($request->password, $data->password)) {
            $data['api_token'] = Str::random(80);
            $data->save();

            return response()->json([
                'message'   => 'Success Login',
                'token'     => $data['api_token'],
                'user'      => new UserResource($data)
            ], 200);
        }

        return response()->json([
            'message'   => 'your email or password is wrong'
        ], 409);
    }

    public function signup(Request $request)
    {
        if (
            !$request->name || !$request->email || !$request->password
            || !$request->toko || !$request->deskripsi
        ) {
            return response()->json([
                'message'   => 'Name, Email, Toko, Deskripsi and Password are required'
            ], 409);
        }
        $extramsg = '';
        if($request->hasFile('img')){
            $extramsg .= ' && has file';
        }else{
            $extramsg .= ' && doesn\'t have file';
        }
        $check = User::where('email', $request->email)->first();
        if ($check) {
            return response()->json([
                'message'   => 'Email already used'
            ], 409);
        }
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'toko' => $request->toko,
            'deskripsi' => $request->deskripsi,
            'img' => '#',
            'password' => Hash::make($request->password),
            'api_token' => Str::random(80),
        ]);



        return response()->json([
            'message'   => 'Success register new user' . $extramsg,
            'token'     => $data['api_token'],
            'user'      => new UserResource($data)
        ], 200);
    }

    public function umkm()
    {
        $data = User::get();
        return response()->json([
            UserResource::collection($data)
        ]);
    }

    public function umkmDetails($id)
    {
        $data = User::with('products')->find($id);
        if ($data) {
            return response()->json([
                new UserResource($data)
            ]);
        } else {
            return response()->json([
                'message' => 'not found'
            ], 404);
        }
    }
}
