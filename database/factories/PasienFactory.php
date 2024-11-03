<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rekam_medis' => 'RM-' . $this->faker->unique()->numerify('######'),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber(),
            'tgl_lahir' => $this->faker->date('Y-m-d', '-18 years'),
            'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'status_nikah' => $this->faker->randomElement(['Belum Menikah', 'Menikah', 'Cerai']),
            'pekerjaan' => $this->faker->jobTitle(),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'keluhan' => $this->faker->sentence(),
            'riwayat_penyakit' => $this->faker->sentence(),
            'riwayat_alergi' => $this->faker->sentence(),
            'riwayat_obat' => $this->faker->sentence(),
        ];
    }
}
