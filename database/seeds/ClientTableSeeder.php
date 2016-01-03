<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \AppLaravel\Client::truncate();
        factory(\AppLaravel\Client::class, 10)->create();
    }
}
