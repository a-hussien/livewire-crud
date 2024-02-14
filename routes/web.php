<?php

use App\Livewire\Profile;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Students\StudentList;
use App\Livewire\Students\StudentCreate;
use App\Livewire\Students\StudentUpdate;
use App\Http\Controllers\ProfileController;

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

Route::permanentRedirect('/', '/login');

Route::get('/dashboard', Dashboard::class)
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', StudentList::class)->name('students.index');
    Route::get('/students/create', StudentCreate::class)->name('students.create');
    Route::get('/students/{student}/edit', StudentUpdate::class)->name('students.edit');
});

require __DIR__.'/auth.php';

Route::fallback(function () {
    return redirect('/');
});
