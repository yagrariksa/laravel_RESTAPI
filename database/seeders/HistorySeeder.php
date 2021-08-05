<?php

namespace Database\Seeders;

use App\Models\History;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 0; $j < 10; $j++) {
            $uid = Str::random(10);
            for ($i = 0; $i < 10; $i++) {
                $store = Store::find(rand(1, 100));
                if ($store) {
                    History::create([
                        'store_lat' => $store->lat,
                        'store_long' => $store->long,
                        'store_name' => $store->name_store,
                        'store_reff' => $store->id,
                        'uid' => $uid
                    ]);
                }
            }
        }
    }
}
