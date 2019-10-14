<?php

use Illuminate\Database\Seeder;

class Serial_NosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('serial_nos')->insert([
            'serial_no' => 'A123',
            'hardware_id' => 1,
        ]); //add a static row for demo purposes


        factory(Helpdesk\SerialNumber::class, 250)->create(); //use the factory to add 250 rows

    }
}
