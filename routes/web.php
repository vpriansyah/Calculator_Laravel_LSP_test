<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Routes Untuk menampilkan halaman index
Route::get('/', [CalculatorController::class, 'index']);

// Routes untuk beralih ke dalam controller hitungan operasi
Route::post('/operation', [CalculatorController::class, 'calculator']);

// Routes untuk menggunakan hasil sebelumnya ke dalam hitungan
Route::get('/previous', [CalculatorController::class, 'previous']);
