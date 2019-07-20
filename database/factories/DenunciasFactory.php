<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Investigacao\PostoDenuncia;
use Faker\Generator as Faker;

$factory->define(PostoDenuncia::class, function (Faker $faker) {
    $usuarios = \App\User::all();
    $postos = \App\Models\Investigacao\Posto::all();
    $status = array_keys(PostoDenuncia::LABEL_STATUS);

    return [
        'status' => $status[array_rand($status)],
        'anonimo' => rand()%2==0,
        'usuario_id' => $usuarios->random(1)->first()->id,
        'usuario_validador_id' => $usuarios->random(1)->first()->id,
        'posto_id' => $postos->random(1)->first()->id,
    ];
});
