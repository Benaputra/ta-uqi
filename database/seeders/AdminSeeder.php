<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('admin');

        $mahasiswa = User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $createMahasiswa = Mahasiswa::create([
            'nim'  => '1234567890',
            'user_id' => $mahasiswa->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);
    }
}
