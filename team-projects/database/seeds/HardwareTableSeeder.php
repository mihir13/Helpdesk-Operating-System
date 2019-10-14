<?php

use Illuminate\Database\Seeder;

class HardwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Helpdesk\Hardware::class, 50)->create(); //create 50 rows using the factory
    }
}
