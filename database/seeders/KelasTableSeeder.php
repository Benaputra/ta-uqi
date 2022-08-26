<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Kelas::create([
            'name_kelas' => 'A',
        ]);
        Kelas::create([
            'name_kelas' => 'B',
        ]);
        Kelas::create([
            'name_kelas' => 'C',
        ]);
        Kelas::create([
            'name_kelas' => 'D',
        ]);
    }
}
