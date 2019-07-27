<?php

use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
        		"name" => "Ajouter une permission",
        		"slug" => "permission.create",
        	],
        	[
        		"name" => "Afficher une permission",
        		"slug" => "permission.show",
        	],
        	[
        		"name" => "Modifier une permission",
        		"slug" => "permission.update",
        	],
        	[
        		"name" => "Liste des permissions",
        		"slug" => "permission.index",
        	],
        	[
        		"name" => "Supprimer une permission",
        		"slug" => "permission.destroy",
        	],
        	[
        		"name" => "Ajouter un role",
        		"slug" => "role.create",
        	],
        	[
        		"name" => "Afficher un role",
        		"slug" => "role.show",
        	],
        	[
        		"name" => "Modifier un role",
        		"slug" => "role.update",
        	],
        	[
        		"name" => "Liste des roles",
        		"slug" => "role.index",
        	],
        	[
        		"name" => "Supprimer un role",
        		"slug" => "role.destroy",
        	],
        	[
        		"name" => "Ajouter un urilisateur",
        		"slug" => "user.create",
        	],
        	[
        		"name" => "Afficher un utilisateur",
        		"slug" => "user.show",
        	],
        	[
        		"name" => "Modifier un utilisateur",
        		"slug" => "user.update",
        	],
        	[
        		"name" => "Liste des utilisateur",
        		"slug" => "user.index",
        	],
        	[
        		"name" => "Supprimer un utilisateur",
        		"slug" => "user.destroy",
        	],
        	[
        		"name" => "Ajouter un employe",
        		"slug" => "employe.create",
        	],
        	[
        		"name" => "Afficher un employe",
        		"slug" => "employe.show",
        	],
        	[
        		"name" => "Modifier un employe",
        		"slug" => "employe.update",
        	],
        	[
        		"name" => "Liste des employes",
        		"slug" => "employe.index",
        	],
        	[
        		"name" => "Supprimer un employe",
        		"slug" => "employe.destroy",
        	],
        	[
        		"name" => "Declarer un patient",
        		"slug" => "patient.create",
        	],
        	[
        		"name" => "Afficher un patient",
        		"slug" => "patient.show",
        	],
        	[
        		"name" => "Modifier un patient",
        		"slug" => "patient.update",
        	],
        	[
        		"name" => "Liste des patients",
        		"slug" => "patient.index",
        	],
        	[
        		"name" => "Supprimer un patient",
        		"slug" => "patient.destroy",
        	],
        ];
        DB::table('permissions')->insert($permissions);
    }
}
