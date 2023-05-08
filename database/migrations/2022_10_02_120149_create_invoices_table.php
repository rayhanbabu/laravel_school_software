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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->integer('student_id');
            $table->integer('eiin');
            $table->string('class');
            $table->string('babu');
            $table->string('section');
          
          
            $table->string('payment_type')->nullable();
            $table->timestamp('invoice_time')->nullable();
            $table->date('invoice_date')->nullable();
            $table->integer('invoice_month');
            $table->integer('invoice_year');
            $table->integer('invoice_day');
            $table->string('category');

            $table->text('des1')->nullable();
            $table->integer('amount1')->default(0);
            $table->text('des2')->nullable();
            $table->integer('amount2')->default(0);
            $table->text('des3')->nullable();
            $table->integer('amount3')->default(0);

           
            $table->integer('invoice_amount')->default(0);
            $table->integer('payment_amount')->default(0);
        
        
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
        Schema::dropIfExists('invoices');
    }
};
