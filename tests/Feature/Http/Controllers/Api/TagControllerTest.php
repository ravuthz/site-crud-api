<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Crud\CrudActionsTest;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    use CrudActionsTest;
    protected array $jsonKeys = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh', ['--seed' => null]);

        $input = Tag::factory()->make()->toArray();
        $item = Tag::factory()->create();
        $this->jsonKeys = array_keys($item->toArray());

        $this->setRouteInputItem(
            'tags',
            $input,
            $item
        );
    }

    // Override to test more on assert json structure of action index
    public function checkListResponse($response)
    {
        $response->assertJsonStructure(['data']);
    }

    // Override to test more on assert json structure of action show
    public function checkItemResponse($response)
    {
        $response->assertJsonStructure(['data']);
    }
}
