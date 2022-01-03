<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('done/{todo}', [TodoController::class, 'done'])->name('todos.done');
    Route::get('redo/{todo}', [TodoController::class, 'redo'])->name('todos.redo');
    Route::resource('todos', TodoController::class);
});
