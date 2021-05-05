<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatDesLieuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_des_lieux', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->bigInteger('type_id');
            $table->bigInteger('ville_id');
            $table->string('nbPieces');
            $table->integer('surface');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('ville_id')->references('id')->on('villes')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etat_des_lieux');
    }
}
