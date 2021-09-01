<?php

namespace Database\Factories;

use App\Models\HolidayType;
use Illuminate\Database\Eloquent\Factories\Factory;

class HolidayTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HolidayType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'holiday_type' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
}
