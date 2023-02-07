<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\UnidadController;
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
Route::get('producto/nombre/{nombre}',[ProductoController::class,'findNombre']);

Route::get('unidades',[UnidadController::class,'index']);
Route::get('unidad/{unidad}',[UnidadController::class,'show']);