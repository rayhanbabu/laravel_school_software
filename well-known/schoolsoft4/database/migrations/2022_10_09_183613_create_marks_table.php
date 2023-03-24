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
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            
            $table->integer('uid');
            $table->integer('eiin');
            $table->string('class');
            $table->string('babu');
            $table->string('section');
            $table->string('exam');
            $table->integer('year');

            $table->string('sub11code')->nullable();
            $table->string('sub11n')->nullable();
            $table->integer('sub11c')->default(0);
            $table->integer('sub11m')->default(0);
            $table->integer('sub11p')->default(0);
            $table->integer('sub11t')->default(0);
            $table->float('sub11gp')->nullable();
            $table->string('sub11g')->nullable();
            $table->integer('sub11h')->nullable();


            $table->string('sub12code')->nullable();
            $table->string('sub12n')->nullable();
            $table->integer('sub12c')->default(0);
            $table->integer('sub12m')->default(0);
            $table->integer('sub12p')->default(0);
            $table->integer('sub12t')->default(0);
            $table->float('sub12gp')->nullable();
            $table->string('sub12g')->nullable();
            $table->integer('sub12h')->nullable();

            $table->string('sub13code')->nullable();
            $table->string('sub13n')->nullable();
            $table->integer('sub13c')->default(0);
            $table->integer('sub13m')->default(0);
            $table->integer('sub13p')->default(0);
            $table->integer('sub13t')->default(0);
            $table->float('sub13gp')->nullable();
            $table->string('sub13g')->nullable();
            $table->integer('sub13h')->nullable();

            $table->string('sub14code')->nullable();
            $table->string('sub14n')->nullable();
            $table->integer('sub14c')->default(0);
            $table->integer('sub14m')->default(0);
            $table->integer('sub14p')->default(0);
            $table->integer('sub14t')->default(0);
            $table->float('sub14gp')->nullable();
            $table->string('sub14g')->nullable();
            $table->integer('sub14h')->nullable();

            $table->string('sub15code')->nullable();
            $table->string('sub15n')->nullable();
            $table->integer('sub15c')->default(0);
            $table->integer('sub15m')->default(0);
            $table->integer('sub15p')->default(0);
            $table->integer('sub15t')->default(0);
            $table->float('sub15gp')->nullable();
            $table->string('sub15g')->nullable();
            $table->integer('sub15h')->nullable();

            $table->string('sub16code')->nullable();
            $table->string('sub16n')->nullable();
            $table->string('sub16sn')->nullable();
            $table->integer('sub16c')->default(0);
            $table->integer('sub16m')->default(0);
            $table->integer('sub16p')->default(0);
            $table->integer('sub16t')->default(0);
            $table->float('sub16gp')->nullable();
            $table->string('sub16g')->nullable();
            $table->integer('sub16h')->nullable();


            $table->string('sub17code')->nullable();
            $table->string('sub17n')->nullable();
            $table->integer('sub17c')->default(0);
            $table->integer('sub17m')->default(0);
            $table->integer('sub17p')->default(0);
            $table->integer('sub17t')->default(0);
            $table->float('sub17gp')->nullable();
            $table->string('sub17g')->nullable();
            $table->integer('sub17h')->nullable();


            $table->string('sub18code')->nullable();
            $table->string('sub18n')->nullable();
            $table->integer('sub18c')->default(0);
            $table->integer('sub18m')->default(0);
            $table->integer('sub18p')->default(0);
            $table->integer('sub18t')->default(0);
            $table->float('sub18gp')->nullable();
            $table->string('sub18g')->nullable();
            $table->integer('sub18h')->nullable();


            $table->string('sub19code')->nullable();
            $table->string('sub19n')->nullable();
            $table->integer('sub19c')->default(0);
            $table->integer('sub19m')->default(0);
            $table->integer('sub19p')->default(0);
            $table->integer('sub19t')->default(0);
            $table->float('sub19gp')->nullable();
            $table->string('sub19g')->nullable();
            $table->integer('sub19h')->nullable();


            $table->string('sub20code')->nullable();
            $table->string('sub20n')->nullable();
            $table->integer('sub20c')->default(0);
            $table->integer('sub20m')->default(0);
            $table->integer('sub20p')->default(0);
            $table->integer('sub20t')->default(0);
            $table->float('sub20gp')->nullable();
            $table->string('sub20g')->nullable();
            $table->integer('sub20h')->nullable();


            $table->string('sub21code')->nullable();
            $table->string('sub21n')->nullable();
            $table->integer('sub21c')->default(0);
            $table->integer('sub21m')->default(0);
            $table->integer('sub21p')->default(0);
            $table->integer('sub21t')->default(0);
            $table->float('sub21gp')->nullable();
            $table->string('sub21g')->nullable();
            $table->integer('sub21h')->nullable();


            $table->string('sub22code')->nullable();
            $table->string('sub22n')->nullable();
            $table->integer('sub22c')->default(0);
            $table->integer('sub22m')->default(0);
            $table->integer('sub22p')->default(0);
            $table->integer('sub22t')->default(0);
            $table->float('sub22gp')->nullable();
            $table->string('sub22g')->nullable();
            $table->integer('sub22h')->nullable();


            $table->string('sub23code')->nullable();
            $table->string('sub23n')->nullable();
            $table->string('sub23sn')->nullable();
            $table->integer('sub23c')->default(0);
            $table->integer('sub23m')->default(0);
            $table->integer('sub23p')->default(0);
            $table->integer('sub23t')->default(0);
            $table->float('sub23gp')->nullable();
            $table->string('sub23g')->nullable();
            $table->integer('sub23h')->nullable();


            $table->string('sub24code')->nullable();
            $table->string('sub24n')->nullable();
            $table->string('sub24sn')->nullable();
            $table->integer('sub24c')->default(0);
            $table->integer('sub24m')->default(0);
            $table->integer('sub24p')->default(0);
            $table->integer('sub24t')->default(0);
            $table->float('sub24gp')->nullable();
            $table->string('sub24g')->nullable();
            $table->integer('sub24h')->nullable();

            $table->string('sub11')->nullable();
            $table->string('sub12')->nullable();
            $table->string('sub13')->nullable();
            $table->string('sub14')->nullable();
            $table->string('sub15')->nullable();
            $table->string('sub16')->nullable();
            $table->text('sub17')->nullable();
            $table->text('sub18')->nullable();
            $table->text('sub19')->nullable();
            $table->text('sub20')->nullable();
            $table->text('sub21')->nullable();
            $table->text('sub22')->nullable();
            $table->text('sub23')->nullable();
            $table->text('sub24')->nullable();



            $table->integer('tfail')->nullable();

           

            $table->integer('pclass')->nullable();
            $table->integer('tclass')->nullable();
            $table->integer('total')->nullable();
            $table->float('totalgpa')->nullable();
            $table->float('gpa1')->nullable();
            $table->float('gpa')->nullable();
            $table->string('g')->nullable();
          
            $table->integer('rs')->default(1);
            $table->float('fgp')->default(0);
            $table->text('fg')->nullable();
            $table->float('cgp')->nullable();
            $table->text('cg')->nullable();
            $table->string('result')->nullable();
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
        Schema::dropIfExists('marks');
    }
};
