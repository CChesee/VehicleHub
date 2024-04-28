<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index']);

Route::get('/home', [PageController::class, 'index']);

Route::get('/browse', [PageController::class, 'browse']);
Route::get('/compare', [PageController::class, 'compare']);
Route::get('/myProduct', [PageController::class, 'myProduct']);

Route::get('/hello', function () {
    return "HELLO WORLD";
});
