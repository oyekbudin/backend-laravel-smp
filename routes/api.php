<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ApiSiswaCon;
use App\Http\Controllers\BeritaCon;

Route::get('/apisiswa', [ApiSiswaCon::class, 'index']);
Route::post('/apisiswa', [ApiSiswaCon::class, 'tambahsiswa']);
Route::post('/apipesankesan', [BeritaCon::class, 'apipesankesan']);

Route::get('/test', function () {
    return response()->json([
        "status" => "api hidup"
    ]);
});