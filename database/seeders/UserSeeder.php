<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = User::find(1);
        if ($data) {
            $string = Str::random(10);
            $token = Str::random(80);
            User::create([
                'name' => $string,
                'email' => $string,
                'password' => Hash::make($string),
                'api_token' => $token,
            ]);
        }else{
            User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'api_token' => Str::random(80),
            ]);
        }
    }
}
