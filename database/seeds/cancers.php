<?php

use Illuminate\Database\Seeder;

class cancers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cancers = [
        	[
        		"nom_cancer" => "Cancer du poumon",
        	],
        	[
        		"nom_cancer" => "Cancer du sein",
        	],
        	[
        		"nom_cancer" => "Cancer de la prostate",
        	],
        	[
        		"nom_cancer" => "Cancer du côlon et du rectum",
        	],
        	[
        		"nom_cancer" => "Cancer de la thyroïde",
        	],
        	[
        		"nom_cancer" => "Cancers du col de l'utérus, de l'endomètre et des ovaires",
        	],
        	[
        		"nom_cancer" => "Cancer lèvre-bouche-larynx",
        	],
        	[
        		"nom_cancer" => "Cancer du rein",
        	],
        	[
        		"nom_cancer" => "Cancer du foie",
        	],
        	[
        		"nom_cancer" => "Cancer du cerveau (adulte)",
        	],
        	[
        		"nom_cancer" => "Cancer des testicules",
        	],
        	[
        		"nom_cancer" => "Cancer du pancréas",
        	],
        	[
        		"nom_cancer" => "Cancer des os",
        	],
        	[
        		"nom_cancer" => "Cancer de la peau",
        	],
        	[
        		"nom_cancer" => "Les leucémies",
        	],
        	[
        		"nom_cancer" => "Cancer de l'intestin grêle",
        	],
        	[
        		"nom_cancer" => "Cancer de l'estomac",
        	],
        	[
        		"nom_cancer" => "Cancer de la plèvre",
        	],
        	[
        		"nom_cancer" => "Cancer de l'oesophage",
        	],
        	[
        		"nom_cancer" => "Cancer de la vessie",
        	],
        	[
        		"nom_cancer" => "Les cancers chez l'enfant et l'adolescent",
        	],
        	[
        		"nom_cancer" => "Le cancer de la personne âgée",
        	],
        	[
        		"nom_cancer" => "Les cancers professionnels",
        	],
        	[
        		"nom_cancer" => "Maladie de hodgkin et lymphomes non hodgkiniens",
        	],
        ];

        DB::table('cancers')->insert($cancers);
    }
}
