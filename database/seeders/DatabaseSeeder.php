<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Roda um conjunto de Seeder.
        $this->call([
            //UserSeeder::class,
            ProductSeeder::class,
        ]);

        //Roda somente uma Seeder específica.
        //$this->call(BusinessSeed::class);
    }
}
