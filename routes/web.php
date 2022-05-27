<?php

use Illuminate\Support\Facades\Route;
use Tinigin\Calculator\Http\Controllers\CalculatorController;

Route::get('add/{a}/{b}', [CalculatorController::class, 'add'])->name('calc.add');
Route::get('subtract/{a}/{b}', [CalculatorController::class, 'subtract'])->name('calc.subtract');
