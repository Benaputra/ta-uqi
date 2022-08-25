<?php

namespace Database\Seeders;

use App\Models\Dosen;
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
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('admin');

        $mahasiswa = User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('mahasiswa'),
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $mahasiswi = User::create([
            'name' => 'Mahasiswi',
            'email' => 'mahasiswi@mail.com',
            'password' => bcrypt('mahasiswi'),
            'email_verified_at' => now(),
        ]);
        $mahasiswi->assignRole('mahasiswa');

        $dosen = User::create([
            'name' => 'dosen',
            'email' => 'dosen@mail.com',
            'password' => bcrypt('dosen'),
            'email_verified_at' => now(),
        ]);
        $dosen->assignRole('dosen');

        $createMahasiswa = Mahasiswa::create([
            'name'  => 'Benaputra Putra',
            'nim'  => '1234567890',
            'user_id' => $mahasiswa->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);

        $createDosen = Dosen::create([
            'name'  => 'Benaputra Dosen',
            'nip'  => '0987654321',
            'user_id' => $dosen->id,
        ]);

        $createMahasiswi = Mahasiswa::create([
            'name'  => 'Putri',
            'nim'  => '0809113',
            'user_id' => $mahasiswi->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);
    }
}
