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
    }
}
