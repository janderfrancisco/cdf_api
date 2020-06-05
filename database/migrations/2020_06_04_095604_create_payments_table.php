<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                  ->references('id')
                  ->on('students');
            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')
                ->references('id')
                ->on('plans');
            $table->integer('remaining_essays');
            $table->integer('type_of_payment');
            $table->dateTime('date_time_transaction');

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
        Schema::dropIfExists('payments');
    }
}
