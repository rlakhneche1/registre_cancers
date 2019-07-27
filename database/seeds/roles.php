<?php

use Illuminate\Database\Seeder;
use \YaroslavMolchan\Rbac\Models\Role;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionsadmin = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'];

    	$permissionsdocteur = ['21','22','23','24','25'];

        $adminrole = [
            "name" => "administrateur",
            "slug" => "admin"
        ];

        $docteurrole = [
            "name" => "docteur",
            "slug" => "doc"
        ];

        $admin = Role::create($adminrole);

        $admin->attachPermission($permissionsadmin);
        
        $docteur = Role::create($docteurrole);

        $docteur->attachPermission($permissionsdocteur);
    }
}
