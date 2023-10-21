<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Crud\CrudActionsTest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    use CrudActionsTest;
    protected array $jsonKeys = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh', ['--seed' => null]);

        $input = User::factory()->make()->toArray();
        $input['password'] = '123123';

        $item = User::factory()->create();
        $this->jsonKeys = array_keys($item->toArray());

        $this->setRouteInputItem(
            'users',
            $input,
            $item
        );
    }

    // Override to test more on assert json structure of action index
    public function checkListResponse($response)
    {
//        $response->dd();
        $response->assertJsonStructure([
//            'links', 'meta', 'data' => [
//                '*' => $this->jsonKeys
//            ],
            'data'
        ]);
    }

    // Override to test more on assert json structure of action show
    public function checkItemResponse($response)
    {
//        $response->dd();
        $response->assertJsonStructure([
//            'data' => $this->jsonKeys
            'data'
        ]);
    }
}
