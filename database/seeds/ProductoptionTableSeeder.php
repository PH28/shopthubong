<?php

use Illuminate\Database\Seeder;

class ProductoptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( App\ProductOption::class, 5)->create();
    }
}
