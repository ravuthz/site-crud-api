<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            Tag::class,
            TagStoreRequest::class,
            TagUpdateRequest::class,
            TagResource::class
        );
    }
}
