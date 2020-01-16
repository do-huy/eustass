<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'image' => $faker->imageUrl(400,400),
        'amount' => $faker->randomDigitNot(0),
        'price' => $faker->numberBetween(10,1000),
        'weight' => $faker->numberBetween(10,100),
        'note' => $faker->text,
        'description' => $faker->text,
        'slug' => $faker->text(10),
        'category_id' => $faker->randomElement(App\Models\Category::pluck('id')),
        'category_main_id' => $faker->randomElement(App\Models\CategoryMain::pluck('id')),
        'category_type_id' => $faker->numberBetween(10,100)
    ];
});
