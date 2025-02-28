<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CheckoutController;

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

// Route::prefix('pathao')->group(function () {
//     Route::post('/order', [CheckoutController::class, 'createPathaoOrder']);
//     Route::get('/track/{consignmentId}', [CheckoutController::class, 'trackOrder']);
//     Route::post('/cancel/{consignmentId}', [CheckoutController::class, 'cancelOrder']);
// });
