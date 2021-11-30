<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeekFactory extends Factory
{
    protected $number = '0';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->number++;
        return [
            'number' => $this->number,
        ];
    }
}
