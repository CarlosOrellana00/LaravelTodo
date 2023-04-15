<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', function () {
  return view('app');
});

Route::get('/tareas', function () {
  return view('todos.index');
});

Route::get('/tareas',[TodosController::class,'index'])->name('index');
Route::post('/tareas',[TodosController::class,'store'])->name('todos');

Route::get('/tareas/{id}',[TodosController::class,'show'])->name('todos-edit');
Route::patch('/tareas/{id}',[TodosController::class,'update'])->name('todos-update');
Route::delete('/tareas/{id}',[TodosController::class,'destroy'])->name('todos-destroy');
