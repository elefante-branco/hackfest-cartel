<?php

use \App\Models\Papeis\Papel;
use Illuminate\Database\Seeder;

class PapeisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Papel::ROLE_SLUGS as $key => $value) {
            Papel::create([
                'id' => $key,
                'descricao' => Papel::ROLE_LABELS[$key],
                'slug' => $value,
            ]);
        }
    }
}
