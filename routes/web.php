<?php

use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\LanguageController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::middleware(['auth','isAdmin'])->prefix('admin')->name('admin.')->group(function(){
    Route::post('/ressamlar/storeimage/{id}',[ArtistController::class,'storeImage'])->name('ressamlar.storeImage');
    Route::resource('ressamlar',ArtistController::class);
    Route::resource('user',UserController::class);
    Route::resource('works',WorkController::class);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth','isAdmin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/lang/{lang}',[LanguageController::class,'switcLang']);
