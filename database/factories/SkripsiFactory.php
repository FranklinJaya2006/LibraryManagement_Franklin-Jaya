<?php

namespace Database\Factories;

use App\Models\Skripsi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skripsi>
 */
class SkripsiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => $this->faker->name(),
            'title' => $this->faker->sentence(),
            'pages' => $this->faker->numberBetween(50, 500),
            'university' => $this->faker->randomElement([
                'Universitas Indonesia',
                'Institut Teknologi Bandung',
                'Universitas Gadjah Mada',
                'Universitas Airlangga',
                'Universitas Brawijaya',
                'Universitas Diponegoro',
                'Universitas Padjadjaran',
                'Institut Pertanian Bogor',
                'Universitas Hasanuddin',
                'Universitas Sebelas Maret'
            ]),
            'thn_terbit' => $this->faker->year(),
        ];
    }
}
