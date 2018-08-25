<?php

use Illuminate\Database\Seeder;
use App\Models\Objective;

class ObjectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Objective::class, 4)->create();
    }
}
