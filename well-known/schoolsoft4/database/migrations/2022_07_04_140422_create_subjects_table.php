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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('subid');
            $table->integer('eiin')->nullable();
            $table->string('subcode')->nullable();
            $table->string('tecode')->nullable();
            $table->string('class')->nullable();
            $table->string('babu')->nullable();
            $table->string('subject')->nullable();
            $table->integer('subt')->nullable();
            $table->integer('tmark')->nullable();
            $table->string('cstatus')->nullable();
            $table->string('mstatus')->nullable();
            $table->string('pstatus')->nullable();
            $table->integer('cmark')->nullable();
            $table->integer('mmark')->nullable();
            $table->integer('pmark')->nullable();
            $table->integer('cfail')->nullable();
            $table->integer('mfail')->nullable();
            $table->integer('pfail')->nullable();
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
        Schema::dropIfExists('subjects');
    }
};
