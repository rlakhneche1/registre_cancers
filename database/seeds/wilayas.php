<?php

use Illuminate\Database\Seeder;

class wilayas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wilayas = [
        	[
        		"nom" => "Adrar",
        		"matricule" => "1"
        	],
        	[
        		"nom" => "Chlef",
        		"matricule" => "2"
        	],
        	[
        		"nom" => "Laghouat",
        		"matricule" => "3",
        	],
        	[
        		"nom" => "Oum El Bouaghi",
        		"matricule" => "4",
        	],
        	[
        		"nom" => "Batna",
        		"matricule" => "5",
        	],
        	[
        		"nom" => "Béjaïa",
        		"matricule" => "6",
        	],
        	[
        		"nom" => "Biskra",
        		"matricule" => "7",
        	],
        	[
        		"nom" => "Béchar",
        		"matricule" => "8",
        	],
        	[
        		"nom" => "Blida",
        		"matricule" => "9",
        	],
        	[
        		"nom" => "Bouira",
        		"matricule" => "10",
        	],
        	[
        		"nom" => "Tamanrasset",
        		"matricule" => "11",
        	],
        	[
        		"nom" => "Tébessa",
        		"matricule" => "12",
        	],
        	[
        		"nom" => "Tlemcen",
        		"matricule" => "13",
        	],
        	[
        		"nom" => "Tiaret",
        		"matricule" => "14",
        	],
        	[
        		"nom" => "Tizi Ouzou",
        		"matricule" => "15",
        	],
        	[
        		"nom" => "Alger",
        		"matricule" => "16",
        	],
        	[
        		"nom" => "Djelfa",
        		"matricule" => "17",
        	],
        	[
        		"nom" => "Jijel",
        		"matricule" => "18",
        	],
        	[
        		"nom" => "Sétif",
        		"matricule" => "19",
        	],
        	[
        		"nom" => "Saïda",
        		"matricule" => "20",
        	],
        	[
        		"nom" => "Skikda",
        		"matricule" => "21",
        	],
        	[
        		"nom" => "Sidi Bel Abbès",
        		"matricule" => "22",
        	],
        	[
        		"nom" => "Annaba",
        		"matricule" => "23",
        	],
        	[
        		"nom" => "Guelma",
        		"matricule" => "24",
        	],
        	[
        		"nom" => "Constantine",
        		"matricule" => "25",
        	],
        	[
        		"nom" => "Médéa",
        		"matricule" => "26",
        	],
        	[
        		"nom" => "Mostaganem",
        		"matricule" => "27",
        	],
        	[
        		"nom" => "M'Sila",
        		"matricule" => "28",
        	],
        	[
        		"nom" => "Mascara",
        		"matricule" => "29",
        	],
        	[
        		"nom" => "Ouargla",
        		"matricule" => "30",
        	],
        	[
        		"nom" => "Oran",
        		"matricule" => "31",
        	],
        	[
        		"nom" => "El Bayadh",
        		"matricule" => "32",
        	],
        	[
        		"nom" => "Illizi",
        		"matricule" => "33",
        	],
        	[
        		"nom" => "Bordj Bou Arreridj",
        		"matricule" => "34",
        	],
        	[
        		"nom" => "Boumerdès",
        		"matricule" => "35",
        	],
        	[
        		"nom" => "El Tarf",
        		"matricule" => "36",
        	],
        	[
        		"nom" => "Tindouf",
        		"matricule" => "37"
        	],
        	[
        		"nom" => "Tissemsilt",
        		"matricule" => "38"
        	],
        	[
        		"nom" => "El Oued",
        		"matricule" => "39"
        	],
        	[
        		"nom" => "Khenchela",
        		"matricule" => "40"
        	],
        	[
        		"nom" => "Souk Ahras",
        		"matricule" => "41"
        	],
        	[
        		"nom" => "Tipaza",
        		"matricule" => "42"
        	],
        	[
        		"nom" => "Mila",
        		"matricule" => "43"
        	],
        	[
        		"nom" => "Aïn Defla",
        		"matricule" => "44"
        	],
        	[
        		"nom" => "Naâma",
        		"matricule" => "45"
        	],
        	[
        		"nom" => "Aïn Témouchent",
        		"matricule" => "46"
        	],
        	[
        		"nom" => "Ghardaïa",
        		"matricule" => "47"
        	],
        	[
        		"nom" => "Relizane",
        		"matricule" => "48"
        	],
        ];

        DB::table('wilayas')->insert($wilayas);
    }
}
