<?php

Namespace Database\Seeders;

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
            'name_status' => 'Hadir',
        ]);
        Status::create([
            'name_status' => 'Sakit',
        ]);
        Status::create([
            'name_status' => 'Izin',
        ]);
        Status::create([
            'name_status' => 'Alpha',
        ]);
    }
}
