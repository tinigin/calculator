<?php

namespace Tinigin\Calculator\Http\Controllers;

class CalculatorController extends Controller
{
    public function add($a, $b)
    {
        return view('calculator::calc.index', ['result' => ($a + $b)]);
    }

    public function subtract($a, $b)
    {
        return view('calculator::calc.index', ['result' => ($a - $b)]);
    }
}
