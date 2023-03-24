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
        
          Schema::create('spends', function (Blueprint $table) {
             $table->id();
             $table->integer('eiin');
             $table->date('date');
             $table->string('description');
             $table->integer('day');
             $table->integer('month');
             $table->integer('year');
             $table->string('qty');
             $table->string('unit');
             $table->integer('price');
             $table->integer('total');
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
        Schema::dropIfExists('spends');
    }
};
