<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use App\Http\Controllers\AuthLogout;
use Illuminate\Support\Facades\Auth;
Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admindashboard');
        }

        else {
            return redirect()->route('studentdashboard');
        }
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('admindashboard');

    Route::get('/admin.senators', function () {
        return view('admin.senators');
    })->name('admin.senators');

    Route::get('/admin.vicepres', function () {
        return view('admin.vicepres');
    })->name('admin.vicepres');

    Route::get('/admin.president', function () {
        return view('admin.president');
    })->name('admin.president');

    Route::get('/admin.group', function () {
        return view('admin.group');
    })->name('admin.group');

    Route::get('/admin.participant', function () {
        return view('admin.participant');
    })->name('admin.participant');

    Route::get('/admin.result', function () {
        return view('admin.result');
    })->name('admin.result');

    // Route::post('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // })->name('logouts');

});


Route::prefix('user')->middleware(['auth', user::class])->group(function () {
    Route::get('/user.index', function () {
        return view('user.index');
    })->name('studentdashboard');



    // Route::post('/logout', function () {
    //     Auth::logout();
    //     return redirect('/login');
    // })->name('logout');

});

Route::get('/logout', [AuthLogout::class, 'logout'])->name('logout');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
