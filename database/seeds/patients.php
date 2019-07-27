<?php

use Illuminate\Database\Seeder;

class patients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $patients = [];

        for ($i=1; $i <= 4000 ; $i++) { 
        	array_push($patients, [
        		"code_patient" => $faker->ean13,
        		"nom_patient" => $faker->firstName,
        		"prenom_patient" => $faker->lastName,
        		"date_naissance_patient" =>$faker->date,
        		"sexe_patient" => $faker->randomElement(['M', 'F']),
                "stade_cancer" => $faker->randomElement(['S1', 'S2', 'S3', 'S4']),
                "domaine_activite" => $faker->randomElement(['Aucune', 'Administration', 'Agriculture', 'Foret et pêche','Industrie et artisanat', 'Bâtiments et travaux', 'Commerce', 'Education', 'Services', 'Autres']),
                "profession" => $faker->jobTitle,
                "fumeur" => $faker->randomElement(['F', 'NF']),
                "alcool" => $faker->randomElement(['A', 'NA']),
        		"commune_id" => rand(1, 1545),
                "cancer_id" => rand(1, 24),
                "adresse" => $faker->address,
                "telephone" => $faker->phoneNumber,
        	]);
        }

        DB::table('patients')->insert($patients);
    }
}
