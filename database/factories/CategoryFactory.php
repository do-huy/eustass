<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\CategoryMain;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'image' => $faker->imageUrl(200,200),
        'category_main_id' => $faker->randomElement(CategoryMain::pluck('id')),
    ];
});
