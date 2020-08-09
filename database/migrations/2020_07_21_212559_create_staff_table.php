<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('file_number');
            $table->string('avatar')->nullable();
            $table->string('email');
            $table->string('dob');
            $table->string('state');
            $table->string('gender');
            $table->string('phone');
            $table->string('designation');
            $table->string('grade_level');
            $table->string('location');
            $table->string('address');
            $table->string('qualification');
            $table->string('discipline');
            $table->string('department');
            $table->string('committees')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('staff');
    }
}
