<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\AppLaravel\Entities\User::class)->create([
            'name' => 'Hugo',
            'email' => 'hugo_targino@outlook.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        factory(\AppLaravel\Entities\User::class, 10)->create();
    }
}
