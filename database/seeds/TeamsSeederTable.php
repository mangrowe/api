<?php

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class TeamsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class, 5)->create()->each(function($team) {
            static $i = 1;
            $team->users()->saveMany(User::whereIn('id', [$i, ($i+1), ($i+2)])->get());
            $i++;
        });
    }
}
