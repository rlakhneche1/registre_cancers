<?php

use Illuminate\Database\Seeder;

class employes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employes = [
            [
                "nom_employe" => "NomDocteur",
                "prenom_employe" => "PrenomDocteur",
                "date_naissance_employe" => "1980-06-10",
                "sexe_employe" => "M",
                "specialite_id" => "13",
                "commune_id" => 555
            ],
            [
                "nom_employe" => "NomAdministrateur",
                "prenom_employe" => "PrenomAdministrateur",
                "date_naissance_employe" => "1990-03-16",
                "sexe_employe" => "M",
                "specialite_id" => null,
                "commune_id" => 550
            ],
        ];

        DB::table('employes')->insert($employes);
    }
}
