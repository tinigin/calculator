<?php

namespace Tinigin\Calculator\Database\Factories;

use Tinigin\Calculator\Models\Calculator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalculatorFactory extends Factory
{
    protected $model = Calculator::class;

    public function definition()
    {
        $n1 = $this->faker->numberBetween();
        $n2 = $this->faker->numberBetween();

        return [
            'n1' => $n1,
            'n2' => $n2,
            'action' => '+',
            'result' => $n1 + $n2
        ];
    }
}

