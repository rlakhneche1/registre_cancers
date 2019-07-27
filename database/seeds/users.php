<?php

use Illuminate\Database\Seeder;
use App\User;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        	'name' => "admin",
        	'email' => "admin@gmail.com",
        	'password' => bcrypt('admin123'),
        	'employe_id' => 2
        ];

        $docteur = [
        	'name' => "docteur",
        	'email' => "doc@gmail.com",
        	'password' => bcrypt('doc123'),
        	'employe_id' => 1
        ];

        $adminstrateur = User::create($admin);

        $adminstrateur->attachRole(1);

        $doc = User::create($docteur);

        $doc->attachRole(2);
    }
}
