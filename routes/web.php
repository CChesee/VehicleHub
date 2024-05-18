<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;

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

Route::get('/register', [PageController::class, 'register']);
Route::post('/register', [PageController::class, 'registerLogic']);
Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [PageController::class, 'loginLogic']);
Route::get('/loginRecovery', [PageController::class, 'loginRecovery']);
Route::post('/loginRecovery', [PageController::class, 'loginRecoveryLogic']);
Route::get('/profile', [PageController::class, 'profile']);
Route::get('/logout', [PageController::class, 'logout']);

Route::get('/browse', [PageController::class, 'browse']);
Route::get('/compare', [PageController::class, 'compare']);

Route::get('/myProduct', [VehicleController::class, 'myProduct']);
Route::get('/addProduct', [VehicleController::class, 'addProduct']);
Route::post('/addProductLogic', [VehicleController::class, 'addProductLogic']);
Route::get('/editProduct/{id}', [VehicleController::class, 'editProduct']);
// Route::post('/editProduct/{id}', [VehicleController::class, 'editProductLogic', $id])->name('editProduct');
Route::post('/deleteProduct/{id}', [VehicleController::class, 'deleteProduct']);
Route::get('/previewProduct/{id}', [VehicleController::class, 'previewProduct'])->name('vehicle.preview');



//-------------------------------testing-------------------------------
Route::get('/test', function () {
    return User::all();
});

Route::get('/hello', function () {
    return "HELLO WORLD";
});
