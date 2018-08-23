<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création des catégories:
        App\Category::create([
            'name' => 'Développeur front-end',
        ]);

        App\Category::create([
            'name' => 'Développeur back-end',
        ]);

        App\Category::create([
            'name' => 'Développeur full-stack',
        ]);

        //on supprime toute les image avant de commencer les seeders:
        //Storage::disk('local')->delete(Storage::allFiles());

        //Implémentation des factories:
        factory(App\Post::class, 10)->create()->each(function($post){

            $category = App\Category::find(rand(1,3));

            $post->category()->attach($category);
            $post->save();

            //Pour les images: ne pas oublier le champs post_id
            //$link = str_random(12) . '.jpg';

            //$file = file_get_contents('http://via.placeholder.com/250x250/' . rand(1, 9));
            //Storage::disk('local')->put($link, $file);

            /*$post->picture()->create([
                'title' => 'Default', //Valeur par défaut
                'link' => $link || '', 
            ]);*/

            $post->save();

        });

        


    }
}
