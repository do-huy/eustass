<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\TypeCategory;
use Faker\Generator as Faker;

$factory->define(TypeCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'category_id' => $faker->randomElement(Category::pluck('id')),
    ];
});
