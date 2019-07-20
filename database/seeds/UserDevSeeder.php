<?php

use Illuminate\Database\Seeder;

class UserDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'nome' => 'Álvaro Ferreira Pires de Paiva',
            'email' => 'alvarofepipa@gmail.com',
            'password' => bcrypt('alvaro'),
            'perfil_id' => \App\Models\Papel::ROLE_MP,
        ]);

        factory('App\User', 10)->create();
    }
}
