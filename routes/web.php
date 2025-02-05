<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('posts.index');
});

Route::get('/posts',[PostController::class, 'index'])->name('posts.index')->middleware("auth");

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware("auth");

Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware("auth");

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware("auth");

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware("auth");

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware("auth");

Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy')->middleware("auth");

//1- structure change for database (create table , edit column , remove column)
//2- operations on database (insert record, edit record, delete record)

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
