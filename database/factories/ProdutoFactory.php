<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->word,
        // 'nome' => $faker->unique()->sentence,
        'preco' => 12.2,
    ];
});
