<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(1, 3)),
            'slug' => $this->faker->unique()->slug(mt_rand(1, 2)),
            'sinopsis' =>  $this->faker->sentence(mt_rand(2, 8)),
            // 'full_sinopsis' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(3, 5))) . '</p>',
            'full_sinopsis' => collect($this->faker->paragraphs(mt_rand(3, 5)))
                ->map(function ($p) {
                    return "<p>$p</p>";
                })
                ->implode(''),
            'likeby' => 9,
            // 'createdby' => $this->faker->randomElement(['amstrong.pasaribu', 'bryan.pasaribu']),
            'user_posted' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 3),
            'director_id' => mt_rand(1, 5)
        ];
    }
}
