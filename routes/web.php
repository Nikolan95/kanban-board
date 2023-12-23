<?php

use App\Http\Controllers\TaskController;
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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('/auth/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::get('/task/{id}', [TaskController::class, 'getTask']);

    Route::post('/store-task', [TaskController::class, 'store'])->name('task.create');
    Route::post('/move-task', [TaskController::class, 'moveTasks']);
});