<?php

namespace Database\Factories;

use App\Models\Prize;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'rate' => random_int(1,10) * 10,
            'type' => 1,
            'coupon_type' => 0,
            'coupon_amount' => random_int(1,10) * 100,
            'coupon_expire_in_days' => random_int(1,10) * 10,
        ];
    }
}
