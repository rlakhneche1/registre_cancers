<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(specialites::class);
        $this->call(cancers::class);
        $this->call(organes::class);
        $this->call(wilayas::class);
        $this->call(dairas::class);
        $this->call(communes::class);
        $this->call(employes::class);
        $this->call(permissions::class);
        $this->call(roles::class);
        $this->call(users::class);
    }
}
