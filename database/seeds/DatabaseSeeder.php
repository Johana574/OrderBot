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

        // \App\Pregunta::query()->delete();
	    // \App\Quiz::query()->delete();
    
        $this->call(Categoria1Seeder::class);
        $this->call(Categoria2Seeder::class);

    }
}
