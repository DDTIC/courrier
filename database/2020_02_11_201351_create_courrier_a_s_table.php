<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourrierASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courrier_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numExpediteur');
            $table->string('adresseDest');
            $table->string('objet');
            $table->string('type');
            $table->dateTime('dateSaisie');
            $table->dateTime('dateDepot');
            $table->integer('numservice');
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
        Schema::dropIfExists('courrier_a_s');
    }
}
