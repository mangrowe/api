<?php

use Illuminate\Database\Seeder;

use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 3)->create()->each(function($tag) {
        	$tag->objectives()->sync($tag->id);
        });
    }
}
