<?php

namespace Database\Factories;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Condition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'target' => 0,
            'threshold' => random_int(1,99),
        ];
    }

    public function threshold($number)
    {
        return $this->state(function (array $attributes) use($number) {
            return [
                'threshold' => $number,
            ];
        });
    }
}
