<?php

use Illuminate\Database\Seeder;
use Helpdesk\Problem;
use Helpdesk\Software;

class ProblemsSoftwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to avoid seeding a problem as both hardware and software, odd problem ids are seeded as software and even as hardware

        $problems = Problem::whereRaw('id % 2 = 1')->get(); //get odd id problems

        foreach($problems as $problem) {
            $software = Software::all()->random(); //get a random software object

            //add a row for this problem to the problems_software
            DB::table('problems_software')->insert([
                'id' => $problem->id,
                'os' => str_random(10),
                'software' => $software->id
            ]);
        }
    }
}
