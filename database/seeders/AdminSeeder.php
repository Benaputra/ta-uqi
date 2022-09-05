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
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Admin Informatika',
            'email' => 'informatika@mail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('AdminInformatika');

        $user = User::create([
            'name' => 'Admin Elekronika',
            'email' => 'elektronika@mail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('AdminElektronika');

        $user = User::create([
            'name' => 'Admin Listrik',
            'email' => 'listrik@mail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('AdminListrik');

        $mahasiswa = User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('mahasiswa'),
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $dosen = User::create([
            'name' => 'dosen',
            'email' => 'dosen@mail.com',
            'password' => bcrypt('dosen'),
            'email_verified_at' => now(),
        ]);
        $dosen->assignRole('dosen');

        $createMahasiswa = Mahasiswa::create([
            'name_mahasiswa'  => 'Benaputra Putra',
            'nim'  => '1234567890',
            'user_id' => $mahasiswa->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);

        $createDosen = Dosen::create([
            'name_dosen'  => 'Benaputra Dosen',
            'nip'  => '0987654321',
            'user_id' => $dosen->id,
        ]);
    }
}
