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
        Schema::create('students', function (Blueprint $table){
            $table->id();
            $table->string('image')->nullable();
            $table->string('codema')->nullable();
            $table->integer('stu_id');
            $table->integer('roll');
            $table->string('name');
            $table->integer('eiin');
            $table->string('class');
            $table->string('section');
            $table->string('babu');
            $table->integer('year')->nullable();
            $table->string('exam')->nullable();
            $table->string('moral')->nullable();
            $table->string('main')->nullable();
            $table->string('addi')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->text('address')->nullable();
            $table->integer('phone')->nullable();
            $table->string('pre_class')->nullable();
            $table->string('next_class')->nullable();
            $table->string('pre_babu')->nullable();
            $table->string('next_babu')->nullable();
            $table->string('pre_year')->nullable();
            $table->string('next_year')->nullable(); 
            $table->string('other1')->nullable(); 
            $table->string('other2')->nullable();   
            $table->string('other3')->nullable();   
            $table->string('other4')->nullable();               
            
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
        Schema::dropIfExists('students');
    }
};
