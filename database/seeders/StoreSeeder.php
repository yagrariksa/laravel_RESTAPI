<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            # code...
            Store::create([
                'lat' => rand(1, 1000000),
                'long' => rand(1, 1000000),
                'name_store' => Str::random(10)
            ]);
        }
    }
}
