<?php

use Illuminate\Database\Seeder;

class ProblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Helpdesk\Problem::class, 50)->create(); //use the factory to add 50 rows
    }
}
