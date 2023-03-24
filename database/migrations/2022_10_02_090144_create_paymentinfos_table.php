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

        Schema::create('paymentinfos', function (Blueprint $table) {
            $table->id();
            $table->integer('eiin');
            $table->string('class');
            $table->string('babu');
            $table->string('section');
            $table->date('pre_date')->nullable();
            $table->integer('pre_month')->nullable();
            $table->integer('pre_year')->nullable();
            $table->date('date');
            $table->integer('month');
            $table->integer('year');
            $table->string('des1')->nullable();
            $table->integer('amount1')->nullable();
            $table->string('des2')->nullable();
            $table->integer('amount2')->nullable();
            $table->string('des3')->nullable();
            $table->integer('amount3')->nullable();
            $table->string('des4')->nullable();
            $table->integer('amount4')->nullable();
            $table->string('des5')->nullable();
            $table->integer('amount5')->nullable();
            $table->string('des6')->nullable();
            $table->integer('amount6')->nullable();
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
        Schema::dropIfExists('paymentinfos');
    }
};
