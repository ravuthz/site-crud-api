<?php

namespace App\Crud;

trait CrudActionsTest
{
    public string $route;
    public array $input;
    public $item;

    public function makeRoute($name, $param = null): string
    {
        return route($this->route . '.' . $name, $param ? [$param] : []);
    }

    public function setRouteInputItem(string $route, array $input, $item): void
    {
        $this->route = $route;
        $this->input = $input;
        $this->item = $item;
    }

    public function checkListResponse($response)
    {
        return $response;
    }

    public function checkItemResponse($response)
    {
        return $response;
    }

    public function test_list(): void
    {
        $response = $this->getJson($this->makeRoute(CrudKey::INDEX));
        $response->assertOk();
        $this->checkListResponse($response);
    }

    public function test_show(): void
    {
        $response = $this->getJson($this->makeRoute(CrudKey::SHOW, $this->item));
        $response->assertOk();
        $this->checkItemResponse($response);
    }

    public function test_create(): void
    {
        $response = $this->postJson($this->makeRoute(CrudKey::STORE), $this->input);
        // $response->assertCreated();
        $this->assertTrue($response->status() == 200 || $response->status() == 201);
    }
    public function test_update(): void
    {
        $response = $this->patchJson($this->makeRoute(CrudKey::UPDATE, $this->item), $this->input);
        $response->assertOk();
    }

    public function test_delete(): void
    {
        $response = $this->deleteJson($this->makeRoute(CrudKey::DESTROY, $this->item));
        // $response->assertNoContent();
        $this->assertTrue($response->status() == 200 || $response->status() == 204);
    }

}
