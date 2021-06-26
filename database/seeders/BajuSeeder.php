<?php

namespace Database\Seeders;

use App\Models\Baju;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Baju::create([
            'name' => 'Baju ' . Str::random(5),
            'price' => 100
        ]);
    }
}
