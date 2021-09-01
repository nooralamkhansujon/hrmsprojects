<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('education_level');
            $table->string('major_group');
            $table->string('institute');
            $table->string('country');
            $table->string('result_type');
            $table->decimal('result',40,2);
            $table->string('passing_year');
            $table->string('duration');
            $table->text('achievement');
            $table->unsignedInteger('employee_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
