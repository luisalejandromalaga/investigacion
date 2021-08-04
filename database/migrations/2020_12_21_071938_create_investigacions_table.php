<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigacions', function (Blueprint $table) {
            $table->id('tesis_id');
            $table->string('titulo');
            $table->string('agno');
            $table->string('criterios');
            $table->string('universidad');
            $table->string('archivo');
            $table->string('metodologia');
            $table->string('poblacion');
            $table->json('variables');
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
        Schema::dropIfExists('investigacions');
    }
}
