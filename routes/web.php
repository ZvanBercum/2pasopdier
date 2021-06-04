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
Route::middleware(['auth'])->group(function() {
    Route::redirect('/', 'dashboard');
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user_edit_profile');
    Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/pet/show/{id}', [App\Http\Controllers\PetController::class, 'show'])->name('pet.show');
    Route::get('/pet/owner/', [App\Http\Controllers\PetController::class, 'owner'])->name('owner_pets');
    Route::get('/pet/edit/{id}', [App\Http\Controllers\PetController::class, 'edit'])->name('pet.edit');
    Route::put('/pet/update/{id}', [App\Http\Controllers\PetController::class, 'update'])->name('pet.update');
    Route::get('/pet/add/', [App\Http\Controllers\PetController::class, 'add'])->name('pet.add');
    Route::put('/pet/store/', [App\Http\Controllers\PetController::class, 'store'])->name('pet.store');





});

Route::middleware(['auth', 'sitter'])->group(function(){
    Route::get('/showpets', [App\Http\Controllers\PetController::class, 'pets'])->name('dieren');
});

Route::middleware(['auth', 'owner'])->group(function(){
    Route::get('/showsitters', [App\Http\Controllers\UserController::class, 'sitters'])->name('oppassers');
});

require __DIR__.'/auth.php';
