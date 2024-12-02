<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rota para teste da API.
Route::get('/', function () {
    return response()->json(['status' => 'OK'], 200);
});


Route::prefix('consultas')->group(function () {
    Route::get('/', [ConsultaController::class, 'index']);
    Route::post('/', [ConsultaController::class, 'store']);
    Route::get('/{id}', [ConsultaController::class, 'show']);
    Route::put('/{id}', [ConsultaController::class, 'update']);
    Route::delete('/{id}', [ConsultaController::class, 'destroy']);
});;

