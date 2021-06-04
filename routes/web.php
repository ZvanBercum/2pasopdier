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
Route::middleware(['auth', 'block'])->group(function() {
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

Route::middleware(['auth', 'block', 'sitter'])->group(function(){
    Route::get('/showpets', [App\Http\Controllers\PetController::class, 'pets'])->name('dieren');
    Route::put('/pet/accept/{id}', [App\Http\Controllers\PetController::class, 'accept'])->name('pet.accept');
    Route::put('/leaveReview/{id}',[App\Http\Controllers\PetController::class, 'review'])->name('leave_review');
    Route::get('/pet/sitter/', [App\Http\Controllers\PetController::class, 'sitter'])->name('sitter_pets');

});

Route::middleware(['auth', 'block', 'owner'])->group(function(){
    Route::get('/showsitters', [App\Http\Controllers\UserController::class, 'sitters'])->name('oppassers');
    Route::put('/request/accept/{id}', [App\Http\Controllers\PetrequestController::class, 'accept'])->name('request.accept');

});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin',[App\Http\Controllers\UserController::class, 'admin'])->name('admin_panel');
    Route::get('/admin/requests',[App\Http\Controllers\UserController::class, 'admin_requests'])->name('admin.requests');
    Route::get('/admin/block',[App\Http\Controllers\UserController::class, 'admin_block'])->name('admin.block_users');
    Route::put('/user/block/{id}', [App\Http\Controllers\UserController::class, 'user_block'])->name('user.block');
    Route::put('/admin/requests/delete/{id}', [App\Http\Controllers\PetrequestController::class, 'delete'])->name('request.delete');

});

require __DIR__.'/auth.php';
