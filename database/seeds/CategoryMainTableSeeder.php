<?php

use Illuminate\Database\Seeder;

class CategoryMainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CategoryMain::class,5)->create();
    }
}
