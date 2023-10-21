<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;

class SettingController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            Setting::class,
            SettingStoreRequest::class,
            SettingUpdateRequest::class,
            SettingResource::class
        );
    }
}
