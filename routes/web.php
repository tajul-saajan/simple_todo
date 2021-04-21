<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function()
{
    Route::resource('todos', ToDoController::class);

    Route::put('/todos/{todo}/complete', [ToDoController::class, 'complete'])->name('todos.complete');
    Route::put('/todos/{todo}/incomplete', [ToDoController::class, 'incomplete'])->name('todos.incomplete');
});



//Route::get('/todos', [ToDoController::class, 'index'])->name('todo.index');
//Route::get('/todos/create', [ToDoController::class, 'create']);
//Route::post('/todos/create', [ToDoController::class, 'store']);
//Route::get('/todos/{todo}/edit', [ToDoController::class, 'edit']);
//Route::delete('/todos/{todo}/delete', [ToDoController::class, 'delete'])->name('todo.delete');
//Route::patch('/todos/{todo}/update', [ToDoController::class, 'update'])->name('todo.update');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

//Route::get('/users', 'UserController@index');
Route::get('/users', [UserController::class, 'index']);

Route::post('/upload', [UserController::class, 'uploadAvatar']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//emails routes
Route::get('/contact', [ContactController::class , 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class , 'store']);

//authorization
//Route::get('/comment')
