<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SessionController;

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

/*
** Routes secured with sanctum

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

*/

Route::apiResource('sections', SectionController::class);
Route::apiResource('sections.sessions', SessionController::class)->shallow();
Route::get('/sessions', [SessionController::class, 'indexAll'])->name('sessions.index');

Route::apiResource('users', UserController::class);
Route::get('/users/{user}/sections', [UserController::class, 'showSections'])->name('users.sections');