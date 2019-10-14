<?php

use Illuminate\Database\Seeder;

class SpecialistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Helpdesk\Specialism::class, 25)->create(); //use the factory to add 25 rows
    }
}
