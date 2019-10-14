<?php

use Illuminate\Database\Seeder;

class ProblemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('problem_types')->insert([
            [
                'parent' => null,
                'name' => 'Printer',
            ],[
                'parent' => 1,
                'name' => 'Jam',
            ],[
                'parent' => 1,
                'name' => 'Empty',
            ],[
                'parent' => 3,
                'name' => 'No Paper',
            ],[
                'parent' => null,
                'name' => 'Crash',
            ],[
                'parent' => 3,
                'name' => 'No Ink',
            ],[
                'parent' => null,
                'name' => 'No Internet',
            ]
        ]); //Basic static seed so that we have something sensible in the demo

    }
}
