<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            User::class,
            UserStoreRequest::class,
            UserUpdateRequest::class,
            UserResource::class
        );
    }
}
