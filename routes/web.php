<?php

use App\Livewire\Profile;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Students\StudentList;
use App\Livewire\Students\StudentCreate;
use App\Livewire\Students\StudentUpdate;
use App\Http\Controllers\ProfileController;
use App\Livewire\Book\BookList;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function () {

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

        Route::get('/books', BookList::class)->name('books.index');
    });

    require __DIR__.'/auth.php';
});


Route::fallback(function () {
    return redirect('/');
});
