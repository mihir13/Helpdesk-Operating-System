<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database tables in specific order (satisfying pks and fks)
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentsTableSeeder::class, //seed departments table
            PersonnelTableSeeder::class, //seed personnel table
            UsersTableSeeder::class, //seed users table
            ProblemTypesTableSeeder::class, //seed problem_types table
            HardwareTableSeeder::class, //seed hardware table
            SoftwareTableSeeder::class, //seed software table
            Serial_NosTableSeeder::class, //seed serial_nos table
            SpecialistsTableSeeder::class, //seed specialists table
            ProblemsTableSeeder::class, //seed problems table
            ProblemsHardwareTableSeeder::class, //seed problems_hardware table
            ProblemsSoftwareTableSeeder::class //seed problems_software table
        ]);
    }
}
