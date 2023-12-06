<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


//admin
Route::prefix('administrator')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/barangay', function () {
        return view('admin.barangay');
    })->name('admin.barangay');
    Route::get('/beneficiary-type', function () {
        return view('admin.beneficiary-type');
    })->name('admin.beneficiary-type');
    Route::get('/account', function () {
        return view('admin.account');
    })->name('admin.account');
    Route::get('/application', function () {
        return view('admin.application');
    })->name('admin.application');
    Route::get('/approve', function () {
        return view('admin.approve');
    })->name('admin.approve');
    Route::get('/announcement', function () {
        return view('admin.announcement');
    })->name('admin.announcement');
});

//users
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user.dashboard');
    Route::get('/assistance-form/{form}', function () {
        return view('user.form');
    })->name('user.form');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
