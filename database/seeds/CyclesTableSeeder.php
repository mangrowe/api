<?php

use Illuminate\Database\Seeder;
use App\Models\Cycle;

class CyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cycle::class, 4)->create();
    }
}
