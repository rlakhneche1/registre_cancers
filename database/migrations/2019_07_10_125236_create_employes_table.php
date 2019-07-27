<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('nom_employe');
            $table->string('prenom_employe');
            $table->date('date_naissance_employe');
            $table->enum('sexe_employe', ['M', 'F']);
            $table->integer('specialite_id')->unsigned()->nullable()->index();
            $table->integer('commune_id')->unsigned()->index();

              $table->foreign('specialite_id')
                ->references('id')
                ->on('specialites')
                ->onDelete('cascade');

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onDelete('cascade');
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
