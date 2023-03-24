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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desig')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('teacher_userid');
            $table->integer('eiin');
            $table->string('teacher_password');
            $table->string('status')->nullable();
            $table->string('tecode1')->nullable();
            $table->string('tecode2')->nullable();
            $table->string('tecode3')->nullable();
            $table->string('tecode4')->nullable();
            $table->string('tecode5')->nullable();
            $table->string('tecode6')->nullable();
            $table->string('tecode7')->nullable();
            $table->string('tecode8')->nullable();
            $table->string('tecode9')->nullable();
            $table->string('tecode10')->nullable();
            $table->string('tecode11')->nullable();
            $table->string('tecode12')->nullable();
            $table->string('atten_class')->nullable();
            $table->string('atten_babu')->nullable();
            $table->string('atten_section')->nullable();
            $table->string('teacher_fin_access')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
