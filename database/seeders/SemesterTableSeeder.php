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
            'name_semester' => '1',
        ]);
        Semester::create([
            'name_semester' => '2',
        ]);
        Semester::create([
            'name_semester' => '3',
        ]);
        Semester::create([
            'name_semester' => '4',
        ]);
        Semester::create([
            'name_semester' => '5',
        ]);
        Semester::create([
            'name_semester' => '6',
        ]);
        Semester::create([
            'name_semester' => '7',
        ]);
        Semester::create([
            'name_semester' => '8',
        ]);
    }
}
