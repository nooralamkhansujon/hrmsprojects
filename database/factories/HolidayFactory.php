<?php

namespace Database\Factories;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Factories\Factory;

class HolidayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Holiday::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'holiday_type_id' => random_int(1,10),
            'date_from'     => now()->subDay()->format('Y-m-d'),
            'date_to'       => now()->format('Y-m-d'),
            'days'          => 2,
            'reason'        => $this->faker->text(),
            'status'        => random_int(0,1),
            'remarks'       => $this->faker->realText()
        ];
    }
}
