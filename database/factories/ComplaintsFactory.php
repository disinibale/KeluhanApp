<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $array = ['unprocessed', 'processed'];

        return [
            'user_id' => 2,
            'message' => $this->faker->text(200),
            // 'status' => $this->faker->randomElement($array)
        ];
    }
}
