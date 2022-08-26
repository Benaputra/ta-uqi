<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'name_prodi' => 'Teknik Informatika',
        ]);
        Prodi::create([
            'name_prodi' => 'Teknik Listrik',
        ]);
        Prodi::create([
            'name_prodi' => 'Teknik Elektronika',
        ]);
    }
}
