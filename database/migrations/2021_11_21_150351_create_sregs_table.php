<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sregs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('dob');
            $table->string('email');
            $table->string('fname');
            $table->string('mname');
            $table->string('address');
            $table->string('place');
            $table->string('pincode');
            $table->string('uname');
            $table->string('class');
            $table->string('div');
            $table->string('password');
            $table->string('usertype');
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
        Schema::dropIfExists('sregs');
    }
}
