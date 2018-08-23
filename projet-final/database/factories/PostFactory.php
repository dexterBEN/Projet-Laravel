<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    //Pour les types de données voir la docs: https://github.com/fzaninotto/Faker#fakerproviderdatetime
    return [
        'post_type' => $faker->randomElement(['stage' ,'formation', 'indéfinie']),
        'title'=> $faker->sentence(),
        'description' => $faker->paragraph(),
        'date_début' => $faker->date(),
        'date_fin' => $faker->date(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9000.00),//6 chiffres au total par rapport à ce qui à été renseigner dans la table post
        'maxStudent' => $faker->numberBetween($min = 10, $max = 20)

    ];
});
