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
    Route::get('/user/show/{id}', [App\Http\Controllers\UserController::class, 'show']);
    Route::get('/pet/show/{id}', [App\Http\Controllers\PetController::class, 'show']);

});

Route::middleware(['auth', 'sitter'])->group(function(){
    Route::get('/showpets', [App\Http\Controllers\PetController::class, 'pets'])->name('dieren');
});

Route::middleware(['auth', 'owner'])->group(function(){
    Route::get('/showsitters', [App\Http\Controllers\UserController::class, 'sitters'])->name('oppassers');
});

    Route::get('/user_edit_profile', function () {
    return view('dashboard');
    })->middleware(['auth'])->name('user_edit_profile');


require __DIR__.'/auth.php';
