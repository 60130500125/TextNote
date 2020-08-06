<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class University extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('university_name');
            $table->string('abbreviations_university');
            $table->string('student_assosiation');
            $table->string('abbreviations_student_assosiation');
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
        Schema::dropIfExists('university');
        Schema::enableForeignKeyConstraints();
    }
}
