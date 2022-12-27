<?php

namespace Database\Seeders;

use App\Models\SettingLokasi;
use Illuminate\Database\Seeder;

class SettingLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingLokasi::create([
            'lat' => '-7.66186953688691',
            'lng' => '110.67878847476526'
        ]);
    }
}
