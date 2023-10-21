<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingTypeStoreRequest;
use App\Http\Requests\SettingTypeUpdateRequest;
use App\Http\Resources\SettingTypeResource;
use App\Models\SettingType;

class SettingTypeController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            SettingType::class,
            SettingTypeStoreRequest::class,
            SettingTypeUpdateRequest::class,
            SettingTypeResource::class
        );
    }

}
