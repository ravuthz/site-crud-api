<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            Category::class,
            CategoryStoreRequest::class,
            CategoryUpdateRequest::class,
            CategoryResource::class
        );
    }
}
