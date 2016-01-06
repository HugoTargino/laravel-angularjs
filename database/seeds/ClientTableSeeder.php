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
        \AppLaravel\Entities\Client::truncate();
        factory(\AppLaravel\Entities\Client::class, 10)->create();
    }
}
