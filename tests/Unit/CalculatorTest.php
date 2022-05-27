<?php

namespace Tinigin\Calculator\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tinigin\Calculator\Tests\TestCase;
use Tinigin\Calculator\Models\Calculator;

class CalculatorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function result_equals_3()
    {
        $calc = Calculator::factory()->create([
            'n1' => 1,
            'n2' => 2,
            'action' => '+',
            'result' => 1 + 2
        ]);
        $this->assertEquals(3, $calc->result);
    }
}
