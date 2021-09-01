<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Department::factory(10)->create();
        // \App\Models\LeaveType::factory(10)->create();
        // \App\Models\Leave::factory(50)->create();
        // \App\Models\HolidayType::factory(10)->create();
        // \App\Models\Holiday::factory(20)->create();
        \App\Models\TrainingProgram::factory(10)->create();
        \App\Models\TrainingInvite::factory(30)->create();
        \App\Models\Client::factory(10)->create();
        \App\Models\Project::factory(20)->create();
        \App\Models\AssignProject::factory(40)->create();
    }
}
