<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'activity'=>'Jam Pertama'
        ]);
        Activity::create([
            'activity'=>'Jam Kedua'
        ]);
        Activity::create([
            'activity'=>'Jam Ketiga'
        ]);
        Activity::create([
            'activity'=>'Jam Keempat'
        ]);
        Activity::create([
            'activity'=>'Jam Kelima'
        ]);
        Activity::create([
            'activity'=>'Jam Istirahat Pertama'
        ]);
        Activity::create([
            'activity'=>'Jam Istirahat Kedua'
        ]);
        Activity::create([
            'activity'=>'Jam Istirahat Ketiga'
        ]);
        Activity::create([
            'activity'=>'Pulang'
        ]);
        Activity::create([
            'activity'=>'Senam'
        ]);
        Activity::create([
            'activity'=>'Imtaq'
        ]);
    }
}
