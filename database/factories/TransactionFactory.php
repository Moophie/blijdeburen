<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user1_id' => $this->faker->numberBetween(1,3),
            'user2_id' => $this->faker->numberBetween(1,3),
            'thing_id' => $this->faker->numberBetween(1,5),
            'start_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+30 days'),
            'end_date' => $this->faker->dateTimeBetween($startDate = '-10 days', $endDate = '+ 10day'),
            'status' => 'confirmed'
        ];
    }
}
