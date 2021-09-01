<?php

namespace Database\Factories;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random_data = random_int(1,3);
        return [
            'leave_type_id' => random_int(1,10),
            'employee_id'   =>  $random_data == 2 ? 3:$random_data,
            'date_from'     => now()->subDay()->format('Y-m-d'),
            'date_to'       => now()->format('Y-m-d'),
            'days'          => 2,
            'reason'        => $this->faker->text(),
            'status'        => random_int(0,1),
            'remarks'       => $this->faker->realText()

        ];
    }
}
