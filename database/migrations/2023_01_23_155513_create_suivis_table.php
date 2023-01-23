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
        Schema::create('suivis', function (Blueprint $table) {
            $table->id();
            $table->string('service');
            $table->string('activite');
            $table->integer('facture_id')->unsigned();
            $table->integer('bon_id')->unsigned();
            $table->string('date');
            $table->string('nom_societe');
            $table->string('Secteur');
            $table->string('categorie');
            $table->string('besoin');
            $table->integer('calcul');
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
        Schema::dropIfExists('suivis');
    }
};
