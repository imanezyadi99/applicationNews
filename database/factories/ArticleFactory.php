<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::pluck('id')->toArray();

        return [
            'titre'=>$this->faker->sentence(),
            'contenu'=>$this->faker->text(),
            'category_id'=>$this->faker->unique()->randomElement($categories),
            'date_debut' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'date_expiration' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
        ];
    }
}
