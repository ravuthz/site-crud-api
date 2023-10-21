<?php

namespace App\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrudService
{
    private Model|null $model;
    private string|null $resource;
    private string|null $storeRequest;
    private string|null $updateRequest;

    public function __construct(string $model, $storeRequest = null, $updateRequest = null, $resource = null)
    {
        $this->setModel($model);
        $this->setResource($resource);
        $this->storeRequest = $storeRequest;
        $this->updateRequest = $updateRequest;
    }

    public function setModel($model): static
    {
        $this->model = app($model);
        return $this;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setResource($resource): static
    {
        $this->resource = $resource;
        return $this;
    }

    public function save($request, $id = null)
    {
        $data = $this->findOne($id);
        $data->fill($request->all())->save();
        return $data;
    }

    public function findOne($id = null)
    {
        return !$id ? $this->getModel() : $this->getModel()->findOrFail($id);
    }

    public function findAll(Request $request)
    {
        $param = $request->get('size', 10);
        Log::debug("fetchList: ", $request->all());
        return $this->getModel()->paginate($param);
    }

    public function responseList($data, $status = 200, $message = 'Successfully'): mixed
    {
        if ($this->resource) {
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
        $item = $this->findAll($request);
        return $this->responseList($item, 200);
    }

    public function show($id): mixed
    {
        $item = $this->findOne($id);
        return $this->responseItem($item, 200);
    }

    public function store($request)
    {


        $data = $this->save($this->storeRequest ? app($this->storeRequest) : $request);

        return $this->responseItem($data);
    }

    public function update($request, $id)
    {
        $data = $this->save($this->storeRequest ?  app($this->updateRequest) : $request, $id);
        return $this->responseItem($data);
    }

    public function destroy($id)
    {
        $this->findOne($id)->delete();
        return $this->responseItem(null);
    }

}
