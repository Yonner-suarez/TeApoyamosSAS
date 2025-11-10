<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use App\Models\Usuario;
use App\Models\Caso;
use App\Models\Solicitud;
use App\Models\Contacto;
/*
|--------------------------------------------------------------------------
| Factory general (estructura antigua)
|--------------------------------------------------------------------------
| Esta clase centraliza la generación de datos para los modelos:
| Usuario, Caso y Solicitud.
| Compatible con el formato antiguo de Laravel.
|
*/

class GeneralFactory
{
    /**
     * Retorna los datos falsos según el modelo
     */
    public static function getDefinition($model, Faker $faker)
    {
        switch ($model) {
            case Usuario::class:
            return [
                'nombre'       => $faker->name,
                'correo'       => $faker->unique()->safeEmail,
                'telefono'     => $faker->phoneNumber,
                'password'     => bcrypt('password'),
                'rol'          => $faker->randomElement(['abogado', 'cliente', 'admin']),

                // Campos agregados
                'especialidad' => $faker->randomElement([
                    'Derecho Corporativo',
                    'Derecho Laboral',
                    'Derecho Tributario',
                    'Derecho Civil',
                    'Derecho Penal',
                    'Derecho Comercial',
                ]),

                'ubicacion'    => $faker->randomElement([
                    'Bogotá',
                    'Medellín',
                    'Cali',
                    'Barranquilla',
                    'Bucaramanga',
                ]),

                // Foto (URL fake tipo avatar)
                'foto'         => "https://i.pravatar.cc/300?img=" . $faker->numberBetween(1, 70),

                // Enlace al perfil
                'perfil_url'   => 'https://www.teapoyamos.com/perfil/' . $faker->unique()->slug,
            ];


            case Caso::class:
                return [
                    'titulo' => $faker->sentence,
                    'descripcion' => $faker->paragraph,
                    'estado' => $faker->randomElement(['abierto', 'en_progreso', 'cerrado']),
                    'reporte' => $faker->paragraph(3),
                    'fecha_inicio' => $faker->dateTimeThisYear(),
                    'fecha_cierre' => null,
                    'usuario_id' => 1, // o genera con Usuario::factory() si usas factories modernas
                ];

            case Solicitud::class:
                return [
                    'nombre_completo' => $faker->name,
                    'correo' => $faker->unique()->safeEmail,
                    'telefono' => $faker->phoneNumber,
                    'experiencia' => $faker->sentence(10),
                    'hoja_vida' => null,
                    'estado' => $faker->randomElement(['pendiente', 'aprobada', 'rechazada']),
                ];

            case Contacto::class:
                 return [
                    'nombre' => $faker->name,
                    'correo' => $faker->email,
                    'telefono' => $faker->phoneNumber,
                    'asunto' => $faker->sentence,
                    'mensaje' => $faker->paragraph,
                ];
            default:
                return [];
        }
    }
}

/*
|--------------------------------------------------------------------------
| Enlaces al helper $factory->define()
|--------------------------------------------------------------------------
| Así se mantiene la compatibilidad con la sintaxis clásica.
|
*/

$factory->define(Usuario::class, function (Faker $faker) {
    return GeneralFactory::getDefinition(Usuario::class, $faker);
});

$factory->define(Caso::class, function (Faker $faker) {
    return GeneralFactory::getDefinition(Caso::class, $faker);
});

$factory->define(Solicitud::class, function (Faker $faker) {
    return GeneralFactory::getDefinition(Solicitud::class, $faker);
});
