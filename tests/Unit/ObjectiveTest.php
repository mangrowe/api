<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Objective;

class ObjectiveTest extends TestCase
{
    /**
     * Calculate a progress of two Key Results associated.
     *
     * @return void
     */
    public function testTwoKeyResults()
    {
    	$objective = Objective::findOrFail(1);

        $this->assertEquals(50, $objective->progress());
    }

    /**
     * Calculate a progress of one Key Results associated.
     *
     * @return void
     */
    public function testOneKeyResult()
    {
    	$objective = Objective::findOrFail(2);

        $this->assertEquals(0, $objective->progress());
    }
}
