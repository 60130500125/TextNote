<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('password');
            $table->string('user_name');
            $table->string('position');
            $table->bigInteger('university_id')->unsigned();
            $table->timestamps();

            $table->foreign('university_id')->references('id')->on('university')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        
    }
}
