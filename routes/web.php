<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;

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

Route::controller(ProjectController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('projet/{id}', 'show')->name('projet.show');

    Route::get('ajouter_projet', 'create')->name('projet.create');
    Route::post('projet/add', 'store')->name('projet.store');

    Route::get('projet/modifier/{id}', 'edit')->name('projet.edit');
    Route::put('projet/update', 'update')->name('projet.update');
});
