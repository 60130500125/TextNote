<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TextNoteDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_note_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('detail',500);
            $table->string('conclude',300);
            $table->bigInteger('text_note_id')->unsigned();
            $table->timestamps();

            $table->foreign('text_note_id')->references('id')->on('text_note')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_note_detail');
    }
}
