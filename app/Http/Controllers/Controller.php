<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseJson($data = null, $status = 200, $message = 'Successfully')
    {
        return response()->json(
            [
                'data' => $data,
                'status' => $status,
                'message' => $message
            ],
            $status
        );
    }

    public function apiOk($data, $status = 200,  $message = 'OK')
    {
        $result['data'] = $data;
        $result['error'] = null;
        $result['status'] = $status;
        $result['message'] = $message;
        return response()->json($result, $status);
    }

    public function apiError($error, $status = 200, $message = '')
    {
        $result['data'] = null;
        $result['error'] = $error;
        $result['status'] = $status;
        $result['message'] = $message;
        return response()->json($result, $status);
    }
}
