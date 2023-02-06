<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\ProductoController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productos',[ProductoController::class,'index']);

Route::post('productos',[ProductoController::class,'store']);

Route::get('producto/{producto}',[ProductoController::class,'show']);

Route::put('producto/{producto}',[ProductoController::class,'update']);

Route::delete('producto/{producto}',[ProductoController::class,'destroy']);
