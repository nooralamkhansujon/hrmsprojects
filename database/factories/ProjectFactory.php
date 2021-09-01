<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_Name'        => $this->faker->name(),
            'project_description' => $this->faker->realText(),
            'project_code' => $this->faker->countryCode(),
            'client_id'    => random_int(1,10),
        ];
    }
}
