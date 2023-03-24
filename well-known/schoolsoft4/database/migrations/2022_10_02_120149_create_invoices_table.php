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
            $table->integer('eiin');
            $table->string('class');
            $table->string('babu');
            $table->string('section');
            $table->integer('pre_monthdue')->default(0);
            $table->date('invoice_date')->nullable();
            $table->integer('invoice_month');
            $table->integer('invoice_year');
            $table->string('status')->nullable();

            $table->string('des1')->nullable();
            $table->integer('amount1')->default(0);
            $table->string('des2')->nullable();
            $table->integer('amount2')->default(0);
            $table->string('des3')->nullable();
            $table->integer('amount3')->default(0);
            $table->string('des4')->nullable();
            $table->integer('amount4')->default(0);
            $table->string('des5')->nullable();
            $table->integer('amount5')->default(0);
            $table->string('des6')->nullable();
            $table->integer('amount6')->default(0);

            $table->integer('totalamount')->default(0);
            $table->integer('cur_monthpayment')->default(0);
            $table->integer('cur_monthdue')->default(0);

            $table->timestamp('payment_time')->nullable();
            $table->string('payment_type')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_day')->nullable();
            $table->string('payment_month')->nullable();
            $table->string('payment_year')->nullable();


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
