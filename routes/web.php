<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [StudentController::class, 'index'])->name('home');

Route::prefix('student')->name('student.')->group(function() {
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
    Route::post('/post', [StudentController::class, 'store'])->name('store');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
});
