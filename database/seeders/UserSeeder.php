<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'role_id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'Jl. Nurul Hidayah No.56, RW.2, Kp. Tengah, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13540',
            'no_hp' => '081234',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'alamat' => 'klaten',
            'no_hp' => '08849249',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
