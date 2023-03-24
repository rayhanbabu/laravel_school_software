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
        Schema::create('admits', function (Blueprint $table) {
            $table->id();
            $table->integer('eiin');
            $table->string('class')->nullable();
            $table->string('babu')->nullable();
            $table->string('section')->nullable();
            $table->string('time')->nullable();

             $table->string('sub1')->nullable();
             $table->string('sub2')->nullable();
             $table->string('sub3')->nullable();
             $table->string('sub4')->nullable();
             $table->string('sub5')->nullable();
             $table->string('sub6')->nullable();
             $table->string('sub7')->nullable();
             $table->string('sub8')->nullable();
             $table->string('sub9')->nullable();
             $table->string('sub10')->nullable();
             $table->string('sub11')->nullable();
             $table->string('sub12')->nullable();
             $table->string('sub13')->nullable();
             $table->string('sub14')->nullable();
             $table->string('sub15')->nullable();
             $table->string('sub16')->nullable();
             $table->string('sub17')->nullable();
             $table->string('sub18')->nullable();
             $table->string('sub19')->nullable();
             $table->string('sub20')->nullable();

             $table->text('time1')->nullable();
             $table->text('time2')->nullable();
             $table->text('time3')->nullable();
             $table->text('time4')->nullable();
             $table->text('time5')->nullable();
             $table->text('time6')->nullable();
             $table->text('time7')->nullable();
             $table->text('time8')->nullable();
             $table->text('time9')->nullable();
             $table->text('time10')->nullable();
             $table->text('time11')->nullable();
             $table->text('time12')->nullable();
             $table->text('time13')->nullable();
             $table->text('time14')->nullable();
             $table->string('time15')->nullable();
             $table->string('time16')->nullable();
             $table->string('time17')->nullable();
             $table->string('time18')->nullable();
             $table->string('time19')->nullable();
             $table->string('time20')->nullable();

             $table->date('date1')->nullable();
             $table->date('date2')->nullable();
             $table->date('date3')->nullable();
             $table->date('date4')->nullable();
             $table->date('date5')->nullable();
             $table->date('date6')->nullable();
             $table->date('date7')->nullable();
             $table->date('date8')->nullable();
             $table->date('date9')->nullable();
             $table->date('date10')->nullable();
             $table->date('date11')->nullable();
             $table->date('date12')->nullable();
             $table->date('date13')->nullable();
             $table->date('date14')->nullable();
             $table->date('date15')->nullable();
             $table->date('date16')->nullable();
             $table->date('date17')->nullable();
             $table->date('date18')->nullable();
             $table->date('date19')->nullable();
             $table->date('date20')->nullable();




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
        Schema::dropIfExists('admits');
    }
};
