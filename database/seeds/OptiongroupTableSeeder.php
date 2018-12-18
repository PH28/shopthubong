<?php

use Illuminate\Database\Seeder;

class OptiongroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OptionGroup::class, 5)->create();
    }
}
