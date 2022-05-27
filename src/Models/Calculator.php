<?php

namespace Tinigin\Calculator\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;

    protected $table = 'calculator';

    public $timestamps = false;

    protected $fillable = [
        'n1',
        'n2',
        'action',
        'result'
    ];

    protected $hidden = [];

    protected static function newFactory()
    {
        return \Tinigin\Calculator\Database\Factories\CalculatorFactory::new();
    }
}
