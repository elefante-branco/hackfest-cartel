<?php

use Illuminate\Database\Seeder;

class CidadeMediaPrecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [
            'caico' => 240200,
            'natal' => 240810,
            'mossoro' => 240800,
            'parnamirim' => 240325,
        ];

        $files = [
            'caico' => 'app/seed/caico_media.csv',
            'natal' => 'app/seed/natal_media.csv',
            'mossoro' => 'app/seed/mossoro_media.csv',
            'parnamirim' => 'app/seed/parnamirim_media.csv',
        ];

        /*
         * Feed
         */
        foreach ($files as $cidadeNome => $filename) {
            $seeders = [];
            $file = fopen(storage_path($filename), 'r');

            while (($seed = fgetcsv($file, 1000, ',')) !== false) {
                array_push($seeders, [
                    'media' => $seed[0],
                    'desvio_padrao' => $seed[1],
                    'menor_valor' => $seed[2],
                    'maior_valor' => $seed[3],
                    'municipio_id' => $ids[$cidadeNome],
                ]);
            }

            fclose($file);
            \App\Models\Grafico\MediaPreco::insert($seeders);
        }
    }
}
