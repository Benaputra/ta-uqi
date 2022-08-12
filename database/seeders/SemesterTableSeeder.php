<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'name' => '1',
        ]);
        Semester::create([
            'name' => '2',
        ]);
        Semester::create([
            'name' => '3',
        ]);
        Semester::create([
            'name' => '4',
        ]);
        Semester::create([
            'name' => '5',
        ]);
        Semester::create([
            'name' => '6',
        ]);
        Semester::create([
            'name' => '7',
        ]);
        Semester::create([
            'name' => '8',
        ]);
    }
}
