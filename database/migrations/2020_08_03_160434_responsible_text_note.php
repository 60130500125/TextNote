<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResponsibleTextNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsible_text_note', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->bigInteger('text_note_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user');
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
        Schema::dropIfExists('responsible_text_note');
    }
}
