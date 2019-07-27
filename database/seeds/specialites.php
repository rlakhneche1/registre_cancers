<?php

use Illuminate\Database\Seeder;

class specialites extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialites = [
        	[
        		"nom" => "allergologie",
        	],
        	[
        		"nom" => "anesthésiologie",
        	],
        	[
        		"nom" => "andrologie",
        	],
        	[
        		"nom" => "cardiologie",
        	],
        	[
        		"nom" => "chirurgie cardiaque",
        	],
        	[
        		"nom" => "chirurgie esthétique, plastique et reconstructive",
        	],
        	[
        		"nom" => "chirurgie générale",
        	],
        	[
        		"nom" => "chirurgie maxillo-faciale",
        	],
        	[
        		"nom" => "chirurgie pédiatrique",
        	],
        	[
        		"nom" => "chirurgie thoracique",
        	],
        	[
        		"nom" => "chirurgie vasculaire",
        	],
        	[
        		"nom" => "neurochirurgie",
        	],
        	[
        		"nom" => "dermatologie",
        	],
        	[
        		"nom" => "endocrinologie",
        	],
        	[
        		"nom" => "gastro-entérologie",
        	],
        	[
        		"nom" => "gériatrie",
        	],
        	[
        		"nom" => "gynécologie",
        	],
        	[
        		"nom" => "hématologie",
        	],
        	[
        		"nom" => "hépatologie",
        	],
        	[
        		"nom" => "infectiologie",
        	],
        	[
        		"nom" => "médecine aiguë",
        	],
        	[
        		"nom" => "médecine du travail",
        	],
        	[
        		"nom" => "médecine générale",
        	],
        	[
        		"nom" => "médecine interne",
        	],
        	[
        		"nom" => "médecine nucléaire",
        	],
        	[
        		"nom" => "médecine palliative",
        	],
        	[
        		"nom" => "médecine physique",
        	],
        	[
        		"nom" => "médecine préventive",
        	],
        	[
        		"nom" => "néonatologie",
        	],
        	[
        		"nom" => "néphrologie",
        	],
        	[
        		"nom" => "neurologie",
        	],
        	[
        		"nom" => "odontologie",
        	],
        	[
        		"nom" => "oncologie",
        	],
        	[
        		"nom" => "obstétrique",
        	],
        	[
        		"nom" => "ophtalmologie",
        	],
        	[
        		"nom" => "orthopédie",
        	],
        	[
        		"nom" => "Oto-rhino-laryngologie",
        	],
        	[
        		"nom" => "pédiatrie",
        	],
        	[
        		"nom" => "pneumologie",
        	],
        	[
        		"nom" => "psychiatrie",
        	],
        	[
        		"nom" => "radiologie",
        	],
        	[
        		"nom" => "radiothérapie",
        	],
        	[
        		"nom" => "rhumatologie",
        	],
        	[
        		"nom" => "urologie",
        	],
        ];

        DB::table('specialites')->insert($specialites);
    }
}
