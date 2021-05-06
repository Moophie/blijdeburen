<?php

namespace Database\Factories;

use App\Models\Thing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->realText(200),
            'condition' => $this->faker->realText(20),
            'price' => $this->faker->randomFloat(2,0,50),
            'user_id' => $this->faker->numberBetween(0,1),
            'geolng' => $this->faker->randomFloat(5, -180, 180),
            'geolat' => $this->faker->randomFloat(5, -90, 90),
        ];
    }
}
