<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/users', function () {
    // return User::paginate(10);
    return Inertia::render('Users', [
        'users' => User::paginate(10)->through(fn($user)=> [
            'id' => $user-> id,
            'name' => $user-> name
        ])
    ]);
})->name('users');

Route::get('/settings', function () {
    return Inertia::render('Settings');
})->name('settings');

Route::post('/logout', function () {
    dd(request('foo'));
})->name('logout');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/settings.php';
// require __DIR__.'/auth.php';
