<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::get('/', function () {
    return redirect()->route('todos.index');
});

//Route::prefix('{locale}')->group(function () {
    Route::resource('/todos', TodoController::class);

    Route::get('/about', [TodoController::class, 'about']);
//});
