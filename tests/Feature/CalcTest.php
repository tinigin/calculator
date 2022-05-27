<?php

namespace Tinigin\Calculator\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tinigin\Calculator\Tests\TestCase;

class CaclTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function check_add_function()
    {
        $this->get(
            route('calc.add', ['a' => 1, 'b' => 2])
        )
            ->assertSee('result: 3')
            ->assertDontSee('result: 4');
    }

    /** @test */
    function check_subtract_function()
    {
        $this->get(
            route('calc.subtract', ['a' => 10, 'b' => 2])
        )
            ->assertSee('result: 8')
            ->assertDontSee('result: 5');
    }
}
