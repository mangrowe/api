<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Department;

class DepartmentTest extends TestCase
{
    /**
     * Calculate the departments progress father.
     *
     * @return void
     */
    public function testCalculateProgressFather()
    {
    	$department = Department::findOrFail(1);

        $this->assertEquals(70, $department->progress());
    }

    /**
     * Calculate the departments progress children.
     *
     * @return void
     */
    public function testCalculateProgressChildren()
    {
    	$department = Department::findOrFail(2);

        $this->assertEquals(50, $department->progress());
    }
}
