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
            'name' => 'A',
        ]);
        Kelas::create([
            'name' => 'B',
        ]);
        Kelas::create([
            'name' => 'C',
        ]);
        Kelas::create([
            'name' => 'D',
        ]);
    }
}
