<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManhwaController as AdminManhwaController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;
use App\Http\Controllers\Admin\ChapterController as AdminChapterController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\ManhwaController;
use App\Http\Controllers\ChapterController;

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

Route::get('/', [ManhwaController::class, 'index'])
    ->middleware('auth')
    ->name('manhwa.index');

Route::get('/manhwa/{id}', [ManhwaController::class, 'show'])
    ->middleware('auth')
    ->name('manhwa.show');

Route::get('/chapter/{id}', [ChapterController::class, 'show'])
    ->middleware('auth')
    ->name('chapter.show');

Route::get('/genre/{id}', [ManhwaController::class, 'genre'])
    ->middleware('auth')
    ->name('genre.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('Admin.index');
    })->name('index');
    Route::resource('manhwas', AdminManhwaController::class);
    Route::resource('genres', AdminGenreController::class);
    Route::resource('chapters', AdminChapterController::class);
    Route::resource('pages', AdminPageController::class);
});

require __DIR__.'/auth.php';
