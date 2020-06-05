<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name', 80);
            $table->char('email', 80);
            $table->char('document', 20)->nullable();
            $table->char('street', 80)->nullable();
            $table->integer('number')->nullable();
            $table->char('neighborhood', 80)->nullable();
            $table->char('state', 20)->nullable();
            $table->char('phone', 16)->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('students');
    }
}
