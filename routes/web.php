<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MagicLinkController;

Route::get('/', function () {
    return view('auth.magic-login');
})->name('login');

Route::get('/login/magic', [MagicLinkController::class, 'showLoginForm'])->name('login');
Route::post('/login/magic', [MagicLinkController::class, 'sendLink'])->name('magic.send');
Route::get('/login/magic/{token}', [MagicLinkController::class, 'verifyLogin'])->name('magic.verify');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');