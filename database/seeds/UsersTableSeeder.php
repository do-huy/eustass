<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name' => 'huy',
            'email' => 'dohuymidside@gmail.com'
        ]);
        factory(App\Models\User::class)->create([
            'name' => 'quan',
            'email' => 'quan@gmail.com'
        ]);
        // chạy factory cho model user 5 lần
        factory(App\Models\User::class,5)->create();
    }
}
