<?php

namespace Tinigin\Calculator\Tests;

use Tinigin\Calculator\CalculatorServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            CalculatorServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup

        // import the CreatePostsTable class from the migration
        include_once __DIR__ . '/../database/migrations/create_calculator_table.php.stub';

        // run the up() method of that migration class
        (new \CreateCalculatorTable)->up();
    }
}
