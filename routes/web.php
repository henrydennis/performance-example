<?php

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    Route::get('/users', function () {
        $users = User::query()
            ->with('pens')
            ->paginate(15);

        return Inertia::render('Users', [
            'users' => UserResource::collection($users),
        ]);
    })->name('users');


    Route::get('/users/{user}', function (User $user) {
        $relatedUsers = User::query()
            ->with('pens')
            ->whereHas('pens', function ($query) use ($user) {
                $query->whereIn('type', $user->pens->pluck('type')->toArray());
            })
            ->get()
            ->take(5);

        return Inertia::render('User', [
            'user' => $user,
            'related' => UserResource::collection($relatedUsers),
        ]);
    })->name('users.show');
});
