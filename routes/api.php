<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;

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

/**
 * @OA\Info(
 *     description="Cake API",
 *     version="1.0.0",
 *     title="Cake",
 *     @OA\Contact(
 *         email="contact_cake@test.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
/**
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cakes', [CakeController::class, 'store'])->name('api.cake.create');
Route::get('/cakes', [CakeController::class, 'index'])->name('api.cake.index');
Route::get('/cakes/{cake_id}', [CakeController::class, 'show'])->name('api.cake.show');
Route::put('/cakes', [CakeController::class, 'update'])->name('api.cake.update');
Route::delete('/cakes/{cake_id}', [CakeController::class, 'destroy'])->name('api.cake.destroy');
