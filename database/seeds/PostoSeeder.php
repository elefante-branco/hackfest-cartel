<?php

use Illuminate\Database\Seeder;

class PostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder = fopen(storage_path('app/seed/dados_grafico_natal_postos.csv'), 'r');
        $i = 1;

        while (($seed = fgetcsv($seeder, 100000000, ',')) !== false) {
            $posto = \App\Models\Investigacao\Posto::create([
                'id' => $i,
                'nome' => 'Posto '.($i++),
            ]);po

            $precoSeed = [];
            foreach ($seed as $valor) {
                array_push($precoSeed, [
                    'posto_id' => $posto->id,
                    'valor' => $valor,
                ]);
            }
            \App\Models\Investigacao\Preco::insert($precoSeed);
        }

        fclose($seeder);
    }
}
