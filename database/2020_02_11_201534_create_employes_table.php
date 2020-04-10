<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomEmp');
            $table->string('prenomEmp');
            $table->date('dateNaissanceEmp');
            $table->string('adresseEmp');
            $table->string('telephoneEmp');
            $table->string('posteEmp');
            $table->date('dateEmbauche');
            $table->integer('numService');
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
        Schema::dropIfExists('employes');
    }
}
