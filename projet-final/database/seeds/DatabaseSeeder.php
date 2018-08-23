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
        $this->call(UserTableSeeder::class);

        // Appel des autres seeders ici: On commence par céer les category
        $this->call(CategorySeeder::class);

        //Puis les post
        $this->call(PostTableSeeder::class);
    }
}
