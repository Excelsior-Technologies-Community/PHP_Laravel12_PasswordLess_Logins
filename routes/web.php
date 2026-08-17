<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\MagicLinkController;
use App\Http\Controllers\LoginHistoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Passwordless Login
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.magic-login');
})->name('login');

Route::get('/login/magic', [
    MagicLinkController::class,
    'showLoginForm'
])->name('login.magic');

Route::post('/login/magic', [
    MagicLinkController::class,
    'sendLink'
])->name('magic.send');

Route::get('/login/magic/{token}', [
    MagicLinkController::class,
    'verifyLogin'
])->name('magic.verify');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Login History
    |--------------------------------------------------------------------------
    */

    Route::get('/login-history', [
        LoginHistoryController::class,
        'index'
    ])->name('login.history');

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', function () {

        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('admin.dashboard');

        Route::get('/users', [
            UserController::class,
            'index'
        ])->name('admin.users');

        Route::patch('/users/{user}/toggle', [
            UserController::class,
            'toggleStatus'
        ])->name('admin.users.toggle');

        Route::delete('/users/{user}', [
            UserController::class,
            'destroy'
        ])->name('admin.users.destroy');
    });
