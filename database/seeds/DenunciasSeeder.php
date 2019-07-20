<?php

use Illuminate\Database\Seeder;
use \App\Models\Investigacao\PostoDenuncia;

class DenunciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Investigacao\PostoDenuncia', 50)->create();

        PostoDenuncia::where('status', PostoDenuncia::STATUS_AGUARDANDO)->update([
            'usuario_validador_id' => null,
        ]);
    }
}
