<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('utype');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('imgs')->nullable();
            $table->string('emailcode')->nullable();
            $table->enum('email_verified', ['0', '1'])->default(false);
            $table->enum('phone_verified', ['0', '1'])->default(false);
            $table->enum('id_verified', ['0', '1', '2'])->default(false);
            $table->string('image',150)->nullable();
            $table->string('location')->nullable();
            $table->boolean('gender')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('chest')->nullable();
            $table->unsignedInteger('hair_color')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('hair_style')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('eyes_color')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('hips')->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->unsignedInteger('waist')->nullable();
            $table->unsignedInteger('skin_color')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('hair_cut')->nullable()->references('id')->on('constants');
            $table->boolean('tattoo')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
