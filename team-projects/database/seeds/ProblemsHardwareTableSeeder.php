<?php

use Illuminate\Database\Seeder;
use Helpdesk\Problem;
use Helpdesk\SerialNumber;

class ProblemsHardwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to avoid seeding a problem as both hardware and software, odd problem ids are seeded as software and even as hardware

        $problems = Problem::whereRaw('id % 2 = 0')->get(); //get even id problems

        foreach($problems as $problem) {
            $serial = SerialNumber::all()->random(); //get a random serial number object

            //add a row for this problem to the problems_hardware
            DB::table('problems_hardware')->insert([
                'id' => $problem->id,
                'serial_no' => $serial->serial_no,
                'hardware' => $serial->hardware_id
            ]);
        }
    }
}
