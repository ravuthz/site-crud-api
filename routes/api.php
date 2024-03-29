<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AttachmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SettingTypeController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', [AuthController::class, 'user'])->name('auth.user');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::apiResource('users', UserController::class);
Route::apiResource('setting-types', SettingTypeController::class);
Route::apiResource('settings', SettingController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('attachments', AttachmentController::class);
