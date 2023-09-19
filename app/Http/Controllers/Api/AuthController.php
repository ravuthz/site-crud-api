<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return $this->responseJson($user, 201, 'Successfully registered user');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return $this->responseJson(null, 401, 'Unauthorized');
        }

        $data = AuthService::login($request->user(), $request->get('remember_me'));
        return $this->responseJson($data, 200, 'Successfully logged in');
    }

    public function logout(Request $request)
    {
        $data = AuthService::logout($request->user());
        return $this->responseJson($data, 200, 'Successfully logged out');
    }

    public function user(Request $request)
    {
        return $this->responseJson($request->user(), 200, 'Successfully got user');
    }
}
