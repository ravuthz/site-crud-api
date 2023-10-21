<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Crud\CrudActionsTest;
use App\Models\SettingType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingTypeControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    use CrudActionsTest;

    protected array $jsonKeys = ['id', 'name', 'desc'];

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh', ['--seed' => null]);

        $input = SettingType::factory()->make()->toArray();
        $item = SettingType::factory()->create();
        $this->jsonKeys = array_keys($item->toArray());

        $this->setRouteInputItem(
            'setting-types',
            $input,
            $item
        );
    }

    public function checkListResponse($response)
    {
        $response->assertJsonStructure([
//            'links', 'meta', 'data' => [
//                '*' => $this->jsonKeys
//            ],
            'data'
        ]);
    }

    public function checkItemResponse($response)
    {
        $response->assertJsonStructure([
//            'data' => $this->jsonKeys
            'data'
        ]);
    }
}
