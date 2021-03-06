<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\Plato::query()->delete();
	    \App\Categoria::query()->delete();
    
        $this->call(Categoria1Seeder::class);
        $this->call(Categoria2Seeder::class);

    }
}
