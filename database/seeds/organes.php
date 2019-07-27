<?php

use Illuminate\Database\Seeder;

class organes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organes = [
        	[
        		"nom_organe" => "Branchies",
        	],
        	[
        		"nom_organe" => "Pseudobranchie",
        	],
        	[
        		"nom_organe" => "Opercule",
        	],
        	[
        		"nom_organe" => "Coeur",
        	],
        	[
        		"nom_organe" => "Aorte ventrale",
        	],
        	[
        		"nom_organe" => "Veine cardinale postérieure",
        	],
        	[
        		"nom_organe" => "Veine porte",
        	],
        	[
        		"nom_organe" => "Canaux de Cuvier",
        	],
        	[
        		"nom_organe" => "Cavité buccopharyngée",
        	],
        	[
        		"nom_organe" => "Oesophage",
        	],
        	[
        		"nom_organe" => "Intestin",
        	],
        	[
        		"nom_organe" => "Anus",
        	],
        	[
        		"nom_organe" => "Foie",
        	],
        	[
        		"nom_organe" => "Pancréas",
        	],
        	[
        		"nom_organe" => "Vessie gazeuse",
        	],
        	[
        		"nom_organe" => "Rein",
        	],
        	[
        		"nom_organe" => "Uretère",
        	],
        	[
        		"nom_organe" => "Vessie",
        	],
        	[
        		"nom_organe" => "Papille urinaire",
        	],
        	[
        		"nom_organe" => "Ovaire",
        	],
        	[
        		"nom_organe" => "Testicule",
        	],
        	[
        		"nom_organe" => "Oviducte",
        	],
        	[
        		"nom_organe" => "Orifice génital",
        	],
        	[
        		"nom_organe" => "Encéphale",
        	],
        	[
        		"nom_organe" => "Moelle épinière",
        	],
        	[
        		"nom_organe" => "Chorde",
        	],
        	[
        		"nom_organe" => "Narine",
        	],
        	[
        		"nom_organe" => "Oreille interne",
        	],
        	[
        		"nom_organe" => "Oeil",
        	],
        	[
        		"nom_organe" => "Hypophyse",
        	],
        	[
        		"nom_organe" => "Follicules thyroïdiens",
        	],
        	[
        		"nom_organe" => "Rate",
        	],
        	[
        		"nom_organe" => "Thymus",
        	],
        ];

        DB::table('organes')->insert($organes);
    }
}
