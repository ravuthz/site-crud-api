<?php

namespace App\Crud;

use Illuminate\Http\Request;

trait CrudActions
{
    protected CrudService $service;

    public function setCrudActions(string $model,
                                   string $storeRequest = null,
                                   string $updateRequest = null,
                                   string $resource = null): CrudService
    {
        $this->service = new CrudService($model, $storeRequest, $updateRequest, $resource);
        return $this->service;
    }

    public function index(Request $request)
    {
        return $this->service->index($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
