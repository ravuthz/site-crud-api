<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Crud\CrudActionsTest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    use CrudActionsTest;
    protected array $jsonKeys = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh', ['--seed' => null]);

        $category_id = (Category::factory()->create())->id;
        $type_id = (Setting::factory()->create())->id;

        $relations = [
            'category_id' => $category_id,
            'type_id' => $type_id
        ];

        $input = Article::factory()->make($relations)->toArray();
        $item = Article::factory()->create($relations);
        $this->jsonKeys = array_keys($item->toArray());

        $this->setRouteInputItem(
            'articles',
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
