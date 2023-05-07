<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/content', [ContentController::class, 'getAll'])->name('content')->middleware('auth');
Route::get('/generate', [AuthController::class, 'generate']);

Route::get('/content/new', [ContentController::class, 'createContent'])->name('newContent')->middleware('auth');
Route::post('insertContent', [ContentController::class, 'save'])->name("saveContent")->middleware('auth');
Route::get('/content/{id}', [ContentController::class, 'edit'])->middleware('auth');
Route::delete('/content/delete/{id}', [ContentController::class, 'delete'])->name("deleteContent")->middleware('auth');
Route::post('/content/update', [ContentController::class, 'update'])->name("updateContent")->middleware('auth');
