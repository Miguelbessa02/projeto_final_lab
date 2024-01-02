<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Experience;
use App\Models\User;
use App\Models\City;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->text(20);
        $description = $this->faker->text(200);
        $price = $this->faker->randomFloat(2, 10, 100);
        $address = $this->faker->text(50);
        
        $categories = ['sport', 'culture', 'nature', 'gastronomy'];
        $category = $this->faker->randomElement($categories);

        return [
            'user_id' => User::all()->random()->id,
            'city_id' => City::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'address' => $address,
            'category' => $category,
            'creation_date' => Carbon::now()
        ];
    }
}
