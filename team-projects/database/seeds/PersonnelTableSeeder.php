<?php

use Illuminate\Database\Seeder;

class PersonnelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnel')->insert([
            'id' => 'ABC123',
            'first_name' => 'TestName',
            'last_name' => 'TestSurname',
            'job_title' => 'Chief Tester',
            'dept_id' => 1,
            'tel_no' => '1234567890',
        ]); //add one static row for our demo user

        factory(Helpdesk\Person::class, 75)->create(); //create 75 more rows using the factory
    }
}
