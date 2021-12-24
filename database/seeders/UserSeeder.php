<?php

namespace Database\Seeders;

use App\Models\Produk;
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
            $u = User::create([
                'name' => $string,
                'email' => $string . '@gmail.com',
                'toko' => $string,
                'deskripsi' => $string,
                'img' => '#',
                'password' => Hash::make($string),
                'api_token' => $token,
            ]);
            for ($i=0; $i <3 ; $i++) { 
                Produk::create([
                    'name' => $string . ' ' . $i,
                    'price' => $i,
                    'pict' => '#',
                    'user_id' => $u->id,
                ]);
            }
        }else{
            User::create([
                'name' => 'admin',
                'toko' => 'admin',
                'deskripsi' => 'toko admin',
                'img' => '#',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'api_token' => Str::random(80),
            ]);
            for ($i=0; $i <3 ; $i++) { 
                Produk::create([
                    'name' => 'produk ' . $i,
                    'price' => $i,
                    'pict' => '#',
                    'user_id' => 1,
                ]);
            }
        }
    }
}
