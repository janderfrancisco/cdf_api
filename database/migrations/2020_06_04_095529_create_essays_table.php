<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('essays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                  ->references('id')
                  ->on('students');
            $table->char('title');
            $table->mediumText('content');
            $table->char('file')->nullable();
            $table->char('folder')->nullable();
            $table->integer('rate')->nullable();
            $table->dateTime('date_time_begin_correction')->nullable();
            $table->dateTime('date_time_end_correction')->nullable();
            $table->mediumText('comment');
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
        Schema::dropIfExists('essays');
    }
}
