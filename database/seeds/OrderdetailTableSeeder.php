<?php

use Illuminate\Database\Seeder;

class OrderdetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OrderDetail::class, 5)->create();
    }
}
