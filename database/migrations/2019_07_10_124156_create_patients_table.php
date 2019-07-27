<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_patient')->nullable();
            $table->string('nom_patient');
            $table->string('prenom_patient');
            $table->date('date_naissance_patient');
            $table->enum('sexe_patient', ['M', 'F']);
            $table->enum('stade_cancer', ['S1', 'S2', 'S3', 'S4']);
            $table->string('domaine_activite');
            $table->string('profession')->nullable();
            $table->string('adresse');
            $table->string('telephone')->nullable();
            $table->enum('fumeur', ['F', 'NF']);
            $table->enum('alcool', ['A', 'NA']);
            $table->integer('commune_id')->unsigned()->index();
            $table->integer('cancer_id')->unsigned()->index();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
            $table->foreign('cancer_id')->references('id')->on('cancers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
