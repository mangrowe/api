<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\KeyResult;

class KeyResultTest extends TestCase
{
    /**
     * Test percentage of a boolean type.
     * This case the key result is for to do.
     *
     * @return void
     */
    public function testBooleanProgressToDo()
    {
    	$keyResult = new KeyResult();
    	
    	$keyResult->title = 'KR 01';
    	$keyResult->type = 'boolean';
    	$keyResult->initial = 0.0;
    	$keyResult->current = 0.0;
    	$keyResult->target  = 100.0;

        $this->assertEquals(0.0, $keyResult->progress());
    }

    /**
     * Test percentage of a boolean type.
     * This case the key result is done.
     *
     * @return void
     */
    public function testBooleanProgressDone()
    {
    	$keyResult = new KeyResult();
    	
    	$keyResult->title = 'KR 01';
    	$keyResult->type = 'boolean';
    	$keyResult->initial = 0.0;
    	$keyResult->current = 100.0;
    	$keyResult->target  = 100.0;

        $this->assertEquals(100.0, $keyResult->progress());
    }

    /**
     * Test percentage of a numeric type.
     * This case the key result is greater than and range is 0 to 100.
     *
     * @return void
     */
    public function testNumericProgressRangeZeroToHundred()
    {
    	$keyResult = new KeyResult();
    	
    	$keyResult->title = 'KR 01';
    	$keyResult->type = 'numeric';
    	$keyResult->criteria = 'gte';
    	$keyResult->initial = 0.0;
    	$keyResult->current = 75.0;
    	$keyResult->target  = 100.0;

        $this->assertEquals(75.0, $keyResult->progress());
    }

    /**
     * Test percentage of a numeric type.
     * This case the key result is greater than and range is 40 to 80.
     *
     * @return void
     */
    public function testNumericProgressRangeFortyToEighty()
    {
    	$keyResult = new KeyResult();
    	
    	$keyResult->title = 'KR 01';
    	$keyResult->type = 'numeric';
    	$keyResult->criteria = 'gte';
    	$keyResult->initial = 0.0;
    	$keyResult->current = 40.0;
    	$keyResult->target  = 80.0;

        $this->assertEquals(50.0, $keyResult->progress());
    }

    /**
     * Test percentage of a numeric type.
     * This case the key result is less than and range is 80 to 40.
     *
     * @return void
     */
    public function testNumericProgressRangeEightyToForty()
    {
        $keyResult = new KeyResult();
        
        $keyResult->title = 'KR 01';
        $keyResult->type = 'numeric';
        $keyResult->criteria = 'lte';
        $keyResult->initial = 80.0;
        $keyResult->current = 40.0;
        $keyResult->target  = 40.0;

        $this->assertEquals(100.0, $keyResult->progress());
    }
}
