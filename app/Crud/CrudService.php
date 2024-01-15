<?php

namespace App\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;

class CrudService
{
    private Model|null $model;
    private string|null $resource;
    private string|null $collection;
    private string|null $storeRequest;
    private string|null $updateRequest;

    private $findOneFn;
    private $findAllFn;
    private $saveFn;

    public function __construct(string $model, $storeRequest = null, $updateRequest = null, $resource = null, $collection = null)
    {
        $this->model = app($model);
        $this->resource = $resource;
        $this->collection = $collection;
        $this->storeRequest = $storeRequest;
        $this->updateRequest = $updateRequest;

        $this->overrideFindOne(fn ($id) => !$id ? $this->getModel() : $this->getModel()->findOrFail($id));
        $this->overrideFindAll(fn ($request) => $this->getModel()->paginate($request->get('size', 10)));
        $this->overrideSave(function ($request, $id = null) {
            $data = $this->findOne($id, $request)->fill($request->all());
            $data->save();
            return $data;
        });
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function save($request, $id = null)
    {
        return call_user_func($this->saveFn, $request, $id);
    }

    public function findOne($id = null, Request $request)
    {
        return call_user_func($this->findOneFn, $id, $request);
    }

    public function findAll(Request $request)
    {
        return call_user_func($this->findAllFn, $request);
    }

    public function overrideFindOne(callable $callback)
    {
        $this->findOneFn = $callback;
        return $this;
    }

    public function overrideFindAll(callable $callback)
    {
        $this->findAllFn = $callback;
        return $this;
    }

    public function overrideSave(callable $callback)
    {
        $this->saveFn = $callback;
        return $this;
    }

    public function responseList($data, $status = 200, $message = 'Successfully'): mixed
    {
        if ($this->collection) {
            return $this->collection::make($data);
        } else if ($this->resource) {
            return $this->resource::collection($data);
        }
        return response()->json(['data' => $data, 'status' => $status, 'message' => $message]);
    }

    public function responseItem($data, $status = 200, $message = 'Successfully'): mixed
    {
        if ($this->resource) {
            return $this->resource::make($data);
        }
        return response()->json(['data' => $data, 'status' => $status, 'message' => $message]);
    }

    public function index(Request $request): mixed
    {
        $data = $this->findAll($request);
        return $this->responseList($data, 200);
    }

    public function show($id): mixed
    {
        $data = $this->findOne($id);
        return $this->responseItem($data, 200);
    }

    public function store($request)
    {
        $data = $this->save($this->storeRequest ? app($this->storeRequest) : $request);
        return $this->responseItem($data);
    }

    public function update($request, $id)
    {
        $data = $this->save($this->updateRequest ?  app($this->updateRequest) : $request, $id);
        return $this->responseItem($data);
    }

    public function destroy($id)
    {
        $this->findOne($id)->delete();
        return $this->responseItem(null);
    }
}
