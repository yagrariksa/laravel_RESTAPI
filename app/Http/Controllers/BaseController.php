<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function listUser()
    {
        $data = User::get();
        return view('user.list', compact($data));
    }

    public function details($id)
    {
        $data = User::with('produks')->find($id);
        return view('user.details', compact($data));
    }
}
