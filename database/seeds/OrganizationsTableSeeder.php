<?php

use Illuminate\Database\Seeder;
use App\Models\Organization;
use App\Models\User;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Organization::class, 10)->create()->each(function($organization) {
            $organization->users()->saveMany(factory(User::class, 3)->create());
        });
    }
}
