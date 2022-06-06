<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TagsController;


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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/tags',[TagsController::class, 'Index']);

Route::post('/tags/create',[TagsController::class, 'Create']);

Route::get('/tags/{id}',[TagsController::class, 'View']);

Route::post('/tags/update/{id}',[TagsController::class, 'Update']);

Route::delete('/tags/delete/{id}',[TagsController::class, 'Delete']);