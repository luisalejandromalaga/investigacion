<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id('registro_id');
            $table->string('tesis_id');
            $table->string('tecnica_id');
            $table->string('lugar');
            #$table->string('error');/*Se desechan - enviados a nueva tabla error independeinte*/
            #$table->string('error_coment')->default('ningunos');/*Se desechan - enviados a nueva tabla error independeinte*/
            $table->string('error_id');
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
        Schema::dropIfExists('registros');
    }
}
