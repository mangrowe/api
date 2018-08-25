<?php

use Illuminate\Database\Seeder;
use App\Models\CheckIn;

class CheckInsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CheckIn::class, 20)->create();
    }
}
