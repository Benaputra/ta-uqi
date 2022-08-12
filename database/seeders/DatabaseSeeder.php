<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\KelasTableSeeder;
use Database\Seeders\ProdiTableSeeder;
use Database\Seeders\StatusTableSeeder;
use Database\Seeders\RuanganTableSeeder;
use Database\Seeders\SemesterTableSeeder;
use Database\Seeders\MahasiswaTableSeeder;
use Database\Seeders\MatakuliahTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProdiTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(RuanganTableSeeder::class);
        $this->call(MatakuliahTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(MahasiswaTableSeeder::class);
    }
}
