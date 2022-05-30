<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::post('api/fetch-states', [RegisteredUserController::class, 'fetchState']);
Route::post('api/fetch-cities', [RegisteredUserController::class, 'fetchCity']);

require __DIR__.'/auth.php';
