<?php

use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/group/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::post('/group/edit/{id}', [GroupController::class, 'update']);
    Route::get('/group/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/group/create', [GroupController::class, 'store']);
    Route::delete('/group/deleted/{id}', [GroupController::class, 'delete'])->name('group.delete');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
