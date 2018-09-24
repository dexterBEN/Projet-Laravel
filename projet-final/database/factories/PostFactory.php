<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    //Pour les types de données voir la docs: https://github.com/fzaninotto/Faker#fakerproviderdatetime
    return [
        'post_type' => $faker->randomElement(['stage' ,'formation']),
        'title'=> $faker->sentence(),
        'description' => $faker->paragraph(),
        'status'=>$faker->randomElement(['published', 'unpublished']),
        'date_début'=> $faker-> dateTimeBetween('now','1 month', 'Europe/Paris'),
        'date_fin' => $faker-> dateTimeBetween('1 month', '3 months', 'Europe/Paris'),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9000.00),//6 chiffres au total par rapport à ce qui à été renseigner dans la table post
        'maxStudent' => $faker->numberBetween($min = 10, $max = 20)

    ];
});
