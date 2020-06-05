<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annotations', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('essay_id')->unsigned();
            $table->foreign('essay_id')
                    ->references('id')
                    ->on('essays');
            $table->integer('note_id')->unsigned();
            $table->foreign('note_id')
                ->references('id')
                ->on('notes');       
            $table->integer('position_top');
            $table->integer('position_left');
            $table->integer('size');
            $table->integer('height');
            $table->float('rate', 8,2);
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
        Schema::dropIfExists('annotations');
    }
}
