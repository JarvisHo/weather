<?php

namespace Database\Factories;

use App\Models\Condition;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Record::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'program_id' => 1,
            'user_id' => 1,
            'note' => $this->faker->text(),
        ];
    }

    public function program($id)
    {
        return $this->state(function (array $attributes) use($id) {
            return [
                'program_id' => $id,
            ];
        });
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
