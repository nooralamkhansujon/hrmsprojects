<?php

namespace Database\Factories;

use App\Models\TrainingInvite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingInviteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingInvite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'training_program_id' => random_int(1,10),
            'description'         => $this->faker->realText(),
            'date_from'           => now()->subDay()->format('Y-m-d'),
            'date_to'             => now()->format('Y-m-d'),
        ];
    }
}
