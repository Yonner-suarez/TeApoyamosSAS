<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solicitud;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Solicitud::class, function (Faker $faker) {
    return [
        'nombre_completo' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'telefono' => $faker->phoneNumber,
        'experiencia' => $faker->sentence(10),
        'hoja_vida' => null,
        'estado' => $faker->randomElement(['pendiente', 'aprobada', 'rechazada']),
    ];
});
