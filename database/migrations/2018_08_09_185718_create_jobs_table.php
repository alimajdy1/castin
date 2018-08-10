<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->date('need_date');
            $table->double('remuneration');
            $table->boolean('gender')->nullable();
            $table->string('height',10)->nullable();
            $table->string('weight',10)->nullable();
            $table->string('chest',10)->nullable();
            $table->unsignedInteger('hair_color')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('hair_style')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('eyes_color')->nullable()->references('id')->on('constants');
            $table->string('hips',10)->nullable();
            $table->string('size',10)->nullable();
            $table->string('waist',10)->nullable();
            $table->unsignedInteger('skin_color')->nullable()->references('id')->on('constants');
            $table->unsignedInteger('hair_cut')->nullable()->references('id')->on('constants');
            $table->boolean('tattoo')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
