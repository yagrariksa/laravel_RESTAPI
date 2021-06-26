<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
                        'url'   => route('public.baju.index'),
                        'desc'  => 'Get All Baju Data'
                    ],
                    'store' => [
                        'type'  => 'POST',
                        'url'   => route('public.baju.store'),
                        'desc'  => 'Store Baju Data (body:: name: String, price: Int, pict: Image)',
                    ],
                    'details' => [
                        'type'  => 'GET',
                        'url'   => route('public.baju.details', 'id'),
                        'desc'  => 'Get Baju Data with spesific id'
                    ],
                    'update' => [
                        'type'  => 'POST',
                        'url'   => route('public.baju.update', 'id'),
                        'desc'  => 'Update Baju Data with spesific id'
                    ],
                    'delete' => [
                        'type'  => 'DELETE',
                        'url'   => route('public.baju.delete', 'id'),
                        'desc'  => 'Delete Baju Data with spesific id'
                    ],
                ],
                'private' => [
                    'index' => [
                        'type'  => 'GET',
                        'url'   => route('private.baju.index'),
                        'desc'  => 'Get All Baju Data [use Bearer token at Header Authorization]'
                    ],
                    'store' => [
                        'type'  => 'POST',
                        'url'   => route('private.baju.store'),
                        'desc'  => 'Store Baju Data (body:: name: String, price: Int, pict: Image) [use Bearer token at Header Authorization]'
                    ],
                    'details' => [
                        'type'  => 'GET',
                        'url'   => route('private.baju.details', 'id'),
                        'desc'  => 'Get Baju Data with spesific id [use Bearer token at Header Authorization]'
                    ],
                    'update' => [
                        'type'  => 'POST',
                        'url'   => route('private.baju.update', 'id'),
                        'desc'  => 'Update Baju Data with spesific id [use Bearer token at Header Authorization]'
                    ],
                    'delete' => [
                        'type'  => 'DELETE',
                        'url'   => route('private.baju.delete', 'id'),
                        'desc'  => 'Delete Baju Data with spesific id [use Bearer token at Header Authorization]'
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
                'user'      => $data
            ], 200);
        }

        return response()->json([
            'message'   => 'your email or password is wrong'
        ], 409);
    }

    public function signup(Request $request)
    {
        if (!$request->name || !$request->email || !$request->password) {
            return response()->json([
                'message'   => 'Name, Email, and Password are required'
            ], 409);
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
            'password' => Hash::make($request->password),
            'api_token' => Str::random(80),
        ]);

        return response()->json([
            'message'   => 'Success register new user',
            'token'     => $data['api_token'],
            'user'      => $data
        ], 200);
    }
}
