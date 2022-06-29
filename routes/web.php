<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/languageDemo', 'App\Http\Controllers\HomeController@languageDemo');

use Illuminate\Support\Facades\App;
use App\Http\Controllers\HomeController;
 
Route::get('/greeting/{locale}', function ($lang) {
    if (! in_array($lang, ['en', 'es', 'fr'])) {
        abort(400);
    }
 
    App::setLocale($lang);
 
    //
});