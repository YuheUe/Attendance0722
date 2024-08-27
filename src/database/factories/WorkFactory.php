<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dummyDate = $this->faker->dateTimeThisMonth;
        return [
            'date' => $dummyDate->format('Y-m-d'),
            'attendance_start' => $dummyDate->format('H:i:s'),
            'attendance_end' => $dummyDate->modify('+9hour')->format('H:i:s'),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
