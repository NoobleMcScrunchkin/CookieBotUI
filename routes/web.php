<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['cors', 'auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('/{guild}')->group(function () {
        Route::get('/settings', [DashboardController::class, 'guildSettings'])->name('guild.settings');
        Route::get('/{channel}', [DashboardController::class, 'guildChannel'])->name('guild.channel');
    });
});
