<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
//    use CreatesApplication;

    protected bool $seed = true;
    //protected $seeder = \Database\Seeders\TestingSeeder::class; // a lightweight seeder that only seeds what is necessary for tests
}
