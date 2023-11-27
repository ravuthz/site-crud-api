<?php

namespace Tests\Unit;

use Tests\TestCase;
// use Illuminate\Support\Facades\Config;

use function Pest\Stressless\stress;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_this_server(): void
    {
        // env('APP_URL'), Config::get('app.url')
        $host = config('app.url');
        $result = stress($host);
        // $result = stress($host)->dd();
        expect($result->requests()->duration()->med())->toBeLessThan(100);
    }

    public function test_example_server(): void
    {
        $host = 'https://example.com';
        $result = stress('example.com')->concurrently(requests: 3)->for(5)->seconds()->dd();
        // ->dump();
        // ->verbosely();
    }
}
