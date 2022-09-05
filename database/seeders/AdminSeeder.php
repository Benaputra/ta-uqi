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
            'name' => 'Mahasiswa 1',
            'email' => 'mahasiswa1@mail.com',
            'password' => bcrypt('mahasiswa'),
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'name' => 'Mahasiswa 2',
            'email' => 'mahasiswa2@mail.com',
            'password' => bcrypt('mahasiswa'),
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $mahasiswa = User::create([
            'name' => 'Mahasiswa 3',
            'email' => 'mahasiswa3@mail.com',
            'password' => bcrypt('mahasiswa'),
            'email_verified_at' => now(),
        ]);
        $mahasiswa->assignRole('mahasiswa');

        $dosen = User::create([
            'name' => 'Dosen 1',
            'email' => 'dosen1@mail.com',
            'password' => bcrypt('dosen'),
            'email_verified_at' => now(),
        ]);
        $dosen->assignRole('dosen');

        $dosen = User::create([
            'name' => 'Dosen 2',
            'email' => 'dosen2@mail.com',
            'password' => bcrypt('dosen'),
            'email_verified_at' => now(),
        ]);
        $dosen->assignRole('dosen');

        $dosen = User::create([
            'name' => 'Dosen 3',
            'email' => 'dosen3@mail.com',
            'password' => bcrypt('dosen'),
            'email_verified_at' => now(),
        ]);
        $dosen->assignRole('dosen');

        $createMahasiswa = Mahasiswa::create([
            'name_mahasiswa'  => 'Mahasiswa 1',
            'nim'  => '1472583690',
            'user_id' => $mahasiswa->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);

        $createMahasiswa = Mahasiswa::create([
            'name_mahasiswa'  => 'Mahasiswa 2',
            'nim'  => '1593578520',
            'user_id' => $mahasiswa->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);

        $createMahasiswa = Mahasiswa::create([
            'name_mahasiswa'  => 'Mahasiswa 3',
            'nim'  => '1234567890',
            'user_id' => $mahasiswa->id,
            'prodi_id' => 1,
            'kelas_id' => 1,
        ]);

        $createDosen = Dosen::create([
            'name_dosen'  => 'Dosen 1',
            'nip'  => '5286394170',
            'user_id' => $dosen->id,
        ]);

        $createDosen = Dosen::create([
            'name_dosen'  => 'Dosen 2',
            'nip'  => '51963548452',
            'user_id' => $dosen->id,
        ]);

        $createDosen = Dosen::create([
            'name_dosen'  => 'Dosen 3',
            'nip'  => '0987654321',
            'user_id' => $dosen->id,
        ]);
    }
}
