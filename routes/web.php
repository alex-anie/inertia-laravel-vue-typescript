<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/users', function (Request $request) {
    $users = User::query()
        ->when($request->input('search'), function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
        ]);

    return Inertia::render('Users', [
        'users' => $users,
        'filters' => $request->only(['search']),
    ]);
})->name('users');

Route::get( '/settings', function () {
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
