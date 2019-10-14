<?php

use Illuminate\Database\Seeder;

class SoftwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('software')->insert([
            'name' => 'MS Bob'
        ]);
        
        factory(Helpdesk\Software::class, 50)->create(); //use the factory to add 50 rows
    }
}
