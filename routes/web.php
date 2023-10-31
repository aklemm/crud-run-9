<?php

use App\Http\Controllers\Items\IndexController as ItemIndexConroller;
use App\Http\Controllers\Items\CreateController as ItemCreateController;
use App\Http\Controllers\Items\StoreController as ItemStoreController;
use App\Http\Controllers\ProfileController;
use App\Models\Item;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/items', ItemIndexConroller::class)
        ->can('index', Item::class)->name('items.index');
    Route::get('/items/create', ItemCreateController::class)
        ->can('create', Item::class)->name('items.create');
    Route::post('/items', ItemStoreController::class)
        ->can('store', Item::class)->name('items.store');
});

require __DIR__.'/auth.php';
