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
            'name' => 'Teknik Informatika',
        ]);
        Prodi::create([
            'name' => 'Teknik Listrik',
        ]);
        Prodi::create([
            'name' => 'Teknik Elektronika',
        ]);
    }
}
