<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '2',
            'nim' => '3201'.$this->faker->numberBetween(1, 1000),
            'name' => 'Mahasiswa '.$this->faker->name(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'kelas_id' => Kelas::inRandomOrder()->first()->id,
            'prodi_id' => Prodi::inRandomOrder()->first()->id,
            'email' => $this->faker->email(),
        ];
    }
}
