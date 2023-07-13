<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->shuffle(["Horror", "Romantic", "Comedy"]), //salah shuffle hanya bisa pada angka
            'slug' => $this->faker->slug(mt_rand(1, 2))
        ];
    }
}
