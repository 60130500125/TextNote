<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TextNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_note', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('text_note_number');
            $table->string('at')->nullable();
            $table->string('work_section');
            $table->date('date');
            $table->string('year');
            $table->string('topic');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('text_note');
        Schema::enableForeignKeyConstraints();    }
}
