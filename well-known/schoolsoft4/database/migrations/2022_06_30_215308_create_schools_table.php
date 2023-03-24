<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
      {
        
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school');
            $table->string('address');
            $table->integer('eiin');
            $table->string('school_phone');
            $table->string('teacher_phone')->nullable();
            $table->string('email');
            $table->string('school_pass')->nullable();
            $table->string('admin_pass')->nullable();
            $table->string('status')->nullable();
            $table->string('stu_insert_status')->nullable();
            $table->string('image')->nullable();
            $table->string('admin_status')->nullable();
            $table->integer('year')->nullable();
            $table->string('exam')->nullable();
            $table->integer('payment')->nullable();
            $table->text('payment_details')->nullable();
            $table->string('forget_code')->nullable();
            $table->string('forget_time')->nullable();
            $table->integer('mnsize')->nullable();
            $table->integer('ansize')->nullable();
            $table->integer('sasize')->nullable();
            $table->integer('shsize')->nullable();
            $table->string('image_access')->nullable();
            $table->string('sms_access')->nullable();
            $table->string('atten_access')->nullable();
            $table->string('fin_access')->nullable();
            $table->string('other_access')->nullable();
            $table->string('aid')->nullable();
            $table->string('aname')->nullable();
            $table->string('aphone')->nullable();
            $table->string('aemail')->nullable();
            $table->string('text1')->nullable();
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->string('text4')->nullable();
            $table->string('text5')->nullable();
            $table->string('text6')->nullable();
            $table->string('text7')->nullable();
            $table->string('text8')->nullable();
            $table->string('section_des')->nullable();
            $table->text('address_details')->nullable();
            $table->string('shift')->nullable();
            $table->string('admin_section')->nullable();
            $table->integer('test1')->nullable();
            $table->integer('test2')->nullable();
            $table->integer('test3')->nullable();
            $table->integer('test4')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('inv_part')->nullable();
            $table->string('sms_access2')->nullable();
            $table->string('inv_access_day')->nullable();
            $table->string('spend_access')->nullable();
            $table->string('atten_group_access')->nullable();
            $table->string('atten_section_access')->nullable();
            $table->text('sms_text1')->nullable();
            $table->text('sms_text2')->nullable();
            $table->text('sms_text3')->nullable();
            $table->text('sms_text4')->nullable();
            $table->date('created_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->integer('subscribe')->nullable();
            $table->integer('payment_duration')->nullable();
            $table->timestamps();

         });
    
      }


    public function down()
    {
        Schema::dropIfExists('schools');
    }
};
