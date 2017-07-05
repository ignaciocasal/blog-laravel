<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName. ' ' .$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function ($faker) {

    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'content' => $faker->paragraph,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => $faker->numberBetween(1,7),
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    $sourceDir =$faker->imageUrl($width = 640, $height = 480, 'cats');
    $name = 'img_blog_laravel_'.time();
    $path = public_path().'/images/articles/';
    $targetDir = $path.$name;
    file_put_contents($targetDir, file_get_contents($sourceDir));
    return [
        'name' => $name,
        'article_id' => function () {
            return factory(App\Article::class)->create()->id;
        },
    ];
});
