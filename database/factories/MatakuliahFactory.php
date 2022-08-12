<?php

namespace Database\Factories;

use App\Models\Prodi;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matakuliah>
 */
class MatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode' => 'MK'.$this->faker->numberBetween(1, 10),
            'name' => 'Pemrograman'.$this->faker->numberBetween(1, 10),
            'prodi_id' => Prodi::inRandomOrder()->first()->id,
            'semester_id' => Semester::inRandomOrder()->first()->id,
        ];
    }
}
