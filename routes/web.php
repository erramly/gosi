<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', function () {
    return Inertia::render('home', [
        'name' => 'Inertia',
    ]);
});

Route::get('/login', function () {
    return Inertia::render('login');
})->name('login');


Route::post('/login', [UserController::class, 'login']);



// Route::get('/check', function () {
//     return view('check');
// });


Route::get('/ar-quickverify', [CheckUserController::class, 'verify']);






Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [CheckUserController::class, 'index'])->name('users.index');
    // show users
    Route::get('/show-users', [CheckUserController::class, 'show']);
    Route::post('/add-user', [CheckUserController::class, 'store']);
    Route::post('/delete-user/{id}', [CheckUserController::class, 'destroy'])->name('users.destroy');
    Route::post('/update-user/{id}', [CheckUserController::class, 'update']);
});




// check users pdf
Route::post('/verify', [CheckUserController::class, 'verify']);


// for main url
Route::get('/', function () {
   return view('welcome');
});


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');


