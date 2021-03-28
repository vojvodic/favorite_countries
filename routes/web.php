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

/*
 * Back routes refers to authenticated user
 * App\Http\Middleware\Authenticate is responsible for protecting access
 */

use App\Http\Controllers\Back\SettingsController;
use App\Http\Controllers\Back\CountryController;
use App\Http\Controllers\Back\LogoutController;
Route::middleware('auth')->group(function(){
    Route::get('/', [CountryController::class, 'index'])->name('back.countries.index');
    Route::get('/favorites', [CountryController::class, 'favorites'])->name('back.countries.favorites');
    Route::post('/favorites', [CountryController::class, 'store'])->name('back.countries.store');
    Route::delete('/favorites/{id}', [CountryController::class, 'delete'])->name('back.countries.delete');

    Route::post('/favorites/{id}/comments', [CountryController::class, 'storeComment'])->name('back.countries.comment.store');

    Route::get('/settings', [SettingsController::class, 'index'])->name('back.settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('back.settings.update');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('back.logout');
});

/*
 * Front routes refers to unauthenticated user
 */
use App\Http\Controllers\Auth\AuthController;
Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'getLogin'])->name('auth.get_login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.post_login');
});
