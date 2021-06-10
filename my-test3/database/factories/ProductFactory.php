<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        
        'name'=>$faker->firstNameFemale,
        'price'=>$faker->numberBetween(9,99),
        'supplier'=>$faker->company,
        'img'=>$faker->imageUrl($width = 640, $height = 480,'cats')
    ];
});
