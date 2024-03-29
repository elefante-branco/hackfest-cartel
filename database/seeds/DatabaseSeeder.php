<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PapeisTableSeeder::class);
        $this->call(UnidadeFederalSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(CidadeMediaPrecoSeeder::class);
        $this->call(PostoSeeder::class);

        // Testes
        if (env('APP_ENV') != 'production') {
            $this->call(UserDevSeeder::class);
        }

        $this->call(DenunciasSeeder::class);
    }
}
