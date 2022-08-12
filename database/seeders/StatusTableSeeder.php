<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Hadir',
        ]);
        Status::create([
            'name' => 'Sakit',
        ]);
        Status::create([
            'name' => 'Izin',
        ]);
        Status::create([
            'name' => 'Alpha',
        ]);
    }
}
