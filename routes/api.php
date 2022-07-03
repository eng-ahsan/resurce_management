<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\HtmlSnippetController;
use App\Http\Controllers\Api\ResourceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('api')->group(function () {
    Route::resource('url', LinkController::class);
    Route::resource('snippet', HtmlSnippetController::class);
    Route::resource('resource', ResourceController::class);
    Route::get('download', [ResourceController::class, 'download']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
