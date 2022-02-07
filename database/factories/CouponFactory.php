<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expire_in_days' => random_int(1,10) * 10,
            'condition_id' => 1,
            'prize_id' => 1,
            'user_id' => null,
            'expired_at' => date('Y-m-d H:i:s', strtotime('+ ' . random_int(1,3) . ' month')),
            'title' => random_int(1,100) * 10 . '元折價券',
            'type' => 0,
            'amount' => random_int(1,99),
        ];
    }

    public function user($id)
    {
        return $this->state(function (array $attributes) use($id) {
            return [
                'user_id' => $id,
            ];
        });
    }
}
