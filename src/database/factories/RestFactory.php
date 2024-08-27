<?php

namespace Database\Factories;

use App\Models\Work;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
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
            'rest_start' => $dummyDate->format('H:i:s'),
            'rest_end' => $dummyDate->modify('+1hour')->format('H:i:s'),
            'work_id' => function () {
                return Work::factory()->create()->id;
            },
        ];
    }
}
