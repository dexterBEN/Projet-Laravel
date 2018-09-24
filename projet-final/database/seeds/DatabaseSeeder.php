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
        // Appel des autres seeders ici: On commence par céer les utilisateur
        $this->call(UserTableSeeder::class);

        //Appelle  du seeder qui va générer les post
        $this->call(PostTableSeeder::class);
    }
}
