<?php

namespace Database\Seeders;

use App\Models\SettingJam;
use Illuminate\Database\Seeder;

class SettingJamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingJam::create([
            'jam_masuk' => '08:00',
            'batas_jam_masuk' => '08:20',
            'jam_pulang' => '17:00',
        ]);
    }
}
