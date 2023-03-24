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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->integer('eiin');
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('color3')->nullable();
            $table->string('color4')->nullable();
            $table->string('color5')->nullable();
            $table->string('color6')->nullable();
            $table->string('color7')->nullable();
            $table->string('color8')->nullable();
            $table->string('color9')->nullable();
            $table->string('color10')->nullable();
            $table->string('color11')->nullable();
            $table->string('color12')->nullable();
            $table->string('color13')->nullable();
            $table->string('color14')->nullable();
            $table->string('color15')->nullable();
            $table->string('color16')->nullable();
            $table->string('color17')->nullable();
            $table->string('color18')->nullable();
            $table->string('color19')->nullable();
            $table->string('color20')->nullable();
            $table->string('color21')->nullable();
            $table->string('color22')->nullable();
            $table->string('color23')->nullable();
            $table->string('color24')->nullable();
            $table->string('color25')->nullable();
            $table->string('color26')->nullable();
            $table->string('color27')->nullable();
            $table->string('color28')->nullable();
            $table->string('color29')->nullable();
            $table->string('color30')->nullable();
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
        Schema::dropIfExists('colors');
    }
};
