<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employee_id')->nullable();
            $table->string('employee_name')->nullable();
            $table->date('promotion_date')->nullable();
            $table->string('previous_designation')->nullable();
            $table->string('new_designation')->nullable();
            $table->string('previous_grade')->nullable();
            $table->string('new_degree')->nullable();
            $table->date('previous_promotion_date')->nullable();
            $table->decimal('previous_basic',50,2)->nullable();
            $table->decimal('new_basic',50,2)->nullable();
            $table->decimal('previous_gross',50,2)->nullable();
            $table->decimal('increment_amount',50,2)->nullable();
            $table->date('effect_date')->nullable();
            $table->string('refference_no')->unique()->nullable();
            $table->tinyInteger('approved')->default(0);
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
        Schema::dropIfExists('promotions');
    }
}
