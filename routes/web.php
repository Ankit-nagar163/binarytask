<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BinaryTreeController;
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

Route::middleware('auth')->group(function () 
{
    Route::get('/alltree/', [ProfileController::class, 'mytree'])->name('mytree');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/binary-tree', [BinaryTreeController::class, 'index'])->name('binary-tree.index');
Route::get('/binary-tree/create', [BinaryTreeController::class, 'create'])->name('binary-tree.create');
Route::post('/binary-tree/store', [BinaryTreeController::class, 'store'])->name('binary-tree.store');

require __DIR__.'/auth.php';
