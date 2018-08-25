<?php

use Illuminate\Database\Seeder;
use App\Models\KeyResult;

class KeyResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(KeyResult::class, 10)->create();
    }
}
