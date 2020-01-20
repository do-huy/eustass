<?php

use Illuminate\Database\Seeder;

class CategoryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TypeCategory::class,5)->create();
    }
}
