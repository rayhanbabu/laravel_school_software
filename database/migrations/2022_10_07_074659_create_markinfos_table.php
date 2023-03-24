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
        Schema::create('markinfos', function (Blueprint $table) {
            $table->id();
            $table->integer('eiin');
            $table->integer('serial');
            $table->string('class');
            $table->string('babu');
            $table->string('section')->nullable();
            $table->integer('start')->nullable();
            $table->integer('end')->nullable();
            $table->float('gpa')->nullable();
            $table->string('grade')->nullable();
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
        Schema::dropIfExists('markinfos');
    }
};
