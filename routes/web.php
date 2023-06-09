<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\OwnerController;
use App\Models\Animal;
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

Route::get('/', [OwnerController::class, 'show']);

//form for the owner

Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');

Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');

Route::get('/owners/{id}/edit', [OwnerController::class, 'edit'])->name('owners.edit');

Route::put('/owners/{id}', [OwnerController::class, 'update'])->name('owners.update');

//for for the pet

Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');

Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');

Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animals.edit');

Route::put('/animals/{id}', [AnimalController::class, 'update'])->name('animals.update');


Route::get('/animals', [AnimalController::class, 'animals']);

Route::get('/animals/search',[AnimalController::class,'animalSearch']);

