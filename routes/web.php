<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Models\User;

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

Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'regis']);
Route::get('/recoveryNotify', [PageController::class, 'recoveryNotify']);

Route::get('/test', function () {
    return User::all();
});

Route::get('/hello', function () {
    return "HELLO WORLD";
});
