<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            Article::class,
            ArticleStoreRequest::class,
            ArticleUpdateRequest::class,
            ArticleResource::class
        );

        $this->service->overrideFindAll(function ($request) {
            return $this->service->getModel()
                ->whereHasType($request->get('type', 'Post'))
                ->paginate($request->get('size', 10));
        });

        $this->service->overrideFindOne(function ($id, $request) {
            return $this->service->getModel()
                ->whereHasType($request->get('type', 'Post'))
                ->findOrFail($id);
        });
    }
}
