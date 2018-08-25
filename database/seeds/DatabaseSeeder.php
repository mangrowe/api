<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganizationsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(CyclesTableSeeder::class);
        $this->call(ObjectivesTableSeeder::class);
        $this->call(KeyResultsTableSeeder::class);
        $this->call(CheckInsTableSeeder::class);
    }
}
