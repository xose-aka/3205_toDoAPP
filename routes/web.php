<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

    $locale = Session::get('locale', app()->getLocale());

    return redirect()->route('todos.index', ['locale' => $locale]);
});

Route::prefix('{locale}')
    ->where([ 'locale' => '[a-zA-Z]{2}' ])
    ->middleware(['set_locale'])
    ->group(function () {
        Route::resource('/todos', TodoController::class);
        Route::middleware(['noindex'])->get('/about', [TodoController::class, 'about'])->name('about.index');
});

Route::middleware(['delay5s'])->get('todos-list', [TodoController::class, 'apiTodos']);

Route::middleware(['noindex'])->get('readme', function () {
    return response()->file(public_path('README.md'));
});
