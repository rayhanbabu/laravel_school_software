<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
             $table->id();
             $table->integer('eiin');
             $table->string('class')->nullable();
             $table->string('babu')->nullable();
             $table->string('section')->nullable();
             $table->string('day')->nullable();

             $table->integer('sub1')->nullable();
             $table->integer('sub2')->nullable();
             $table->integer('sub3')->nullable();
             $table->integer('sub4')->nullable();
             $table->integer('sub5')->nullable();
             $table->integer('sub6')->nullable();
             $table->integer('sub7')->nullable();
             $table->integer('sub8')->nullable();
             $table->integer('sub9')->nullable();
             $table->integer('sub10')->nullable();
             $table->integer('sub11')->nullable();
             $table->integer('sub12')->nullable();
             $table->integer('sub13')->nullable();
             $table->integer('sub14')->nullable();
             $table->integer('sub15')->nullable();
             $table->integer('sub16')->nullable();

             $table->string('date1')->nullable();
             $table->string('date2')->nullable();
             $table->string('date3')->nullable();
             $table->string('date4')->nullable();
             $table->string('date5')->nullable();
             $table->string('date6')->nullable();
             $table->string('date7')->nullable();
             $table->string('date8')->nullable();
             $table->string('date9')->nullable();
             $table->string('date10')->nullable();
             $table->string('date11')->nullable();
             $table->string('date12')->nullable();
             $table->string('date13')->nullable();
             $table->string('date14')->nullable();
             $table->string('date15')->nullable();
             $table->string('date16')->nullable();

             $table->integer('tea1')->nullable();
             $table->integer('tea2')->nullable();
             $table->integer('tea3')->nullable();
             $table->integer('tea4')->nullable();
             $table->integer('tea5')->nullable();
             $table->integer('tea6')->nullable();
             $table->integer('tea7')->nullable();
             $table->integer('tea8')->nullable();
             $table->integer('tea9')->nullable();
             $table->integer('tea10')->nullable();
             $table->integer('tea11')->nullable();
             $table->integer('tea12')->nullable();
             $table->integer('tea13')->nullable();
             $table->integer('tea14')->nullable();
             $table->integer('tea15')->nullable();
             $table->integer('tea16')->nullable();

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
        Schema::dropIfExists('routines');
    }
};
