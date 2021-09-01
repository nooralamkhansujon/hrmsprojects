<?php

namespace Database\Factories;

use App\Models\AssignProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssignProject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id'   => random_int(1,20),
            'issuing_authority' => 1,
            'date_of_assignment' => now()->format('Y-m-d'),
            'date_of_release'    => now()->addDays(random_int(10,120))->format('Y-m-d')
        ];
    }
}
