<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->tinyInteger('employee_status')->default(1);
            $table->string('employee_department');
            $table->string('designation');
            $table->decimal('basic_salary',50,2);
            $table->decimal('gross_salary',50,2);
            $table->string('tin')->unique();
            $table->string('employee_image');
            $table->string('mobile_number');
            $table->string('emergency_mobile_number');
            $table->string('email');
            $table->date('joining_date');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('nid_number');
            $table->string('religion');
            $table->string('blood_group');
            $table->string('gender');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('weekly_off_day');
            $table->text('permanent_address');
            $table->text('present_address');
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
        Schema::dropIfExists('employees');
    }
}
