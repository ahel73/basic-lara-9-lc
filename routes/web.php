<?php

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
    return view('welcome');
});

Route::get('/workers', [\App\Http\Controllers\WorkerController::class, 'index'])->name('workers.index');
Route::get('/workers/create', [\App\Http\Controllers\WorkerController::class, 'create'])->name('workers.create');
Route::get('/workers/{worker}', [\App\Http\Controllers\WorkerController::class, 'show'])->name('workers.show');
Route::post('/workers', [\App\Http\Controllers\WorkerController::class, 'store'])->name('workers.store');
Route::get('/workers/{worker}/edit', [\App\Http\Controllers\WorkerController::class, 'edit'])->name('workers.edit');
Route::patch('/workers/{worker}', [\App\Http\Controllers\WorkerController::class, 'update'])->name('workers.update');
Route::delete('/workers/{worker}', [\App\Http\Controllers\WorkerController::class, 'delete'])->name('workers.delete');
