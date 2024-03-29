<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Crud\CrudActionsTest;
use App\Models\Attachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttachmentControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    use CrudActionsTest;
    protected array $jsonKeys = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh', ['--seed' => null]);

        $input = Attachment::factory()->make()->toArray();
        $item = Attachment::factory()->create();
        $this->jsonKeys = array_keys($item->toArray());

        $this->setRouteInputItem(
            'attachments',
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
