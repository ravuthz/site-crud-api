<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            Comment::class,
            CommentStoreRequest::class,
            CommentUpdateRequest::class,
            CommentResource::class
        );
    }
}
