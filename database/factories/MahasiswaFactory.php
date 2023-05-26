<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            //
            'Nim' => fake()->numerify('214172####'),
            'Nama' => fake()->name(),
            'Jurusan' => 'Teknologi Informasi',
            'No_Handphone' => fake()->regexify('08[0-9]{10}'),
            'Email' => fake()->safeEmail(),
            'Tanggal_lahir' => fake()->dateTimeBetween('2001-01-01', '2004-12-31'),
            'kelas_id' => 1

        ];
    }
}
