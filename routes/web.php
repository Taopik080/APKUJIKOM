<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotouserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppadminController;
use App\Http\Controllers\AdminimgController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'must-admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/photo', [PhotoController::class, 'index'])->name('photo.index');
    Route::delete('photo/{photo}', [PhotoController::class, 'destroy'])->name('photo.destroy');
    Route::put('confirm/{photo}', [ConfirmController::class, 'update'])->name('confirm.update');
    Route::get('homepage-admin', [AppadminController::class, 'index'])->name('app-admin.index');
    Route::get('homepage-admin/create', [AppadminController::class, 'create'])->name('app-admin.create');
    Route::get('homepage-admin/upload', [AdminimgController::class, 'create'])->name('app-admin.upload');
    Route::post('homepage-admin', [AdminimgController::class, 'store'])->name('app-admin.store');
    Route::delete('upload/{upload}', [AdminimgController::class, 'destroy'])->name('upload.destroy');
    Route::delete('daerah/{daerah}', [AppadminController::class, 'destroy'])->name('app-admin.destroy');
});

Route::middleware(['auth', 'must-user'])->group(function () {
    Route::get('homepage', [AppController::class, 'index'])->name('app.index');
    Route::get('homepage/create', [AppController::class, 'create'])->name('app.create');
    Route::post('homepage', [AppController::class, 'store'])->name('app.store');
    Route::post('/photo/{photo}/like', [LikeController::class, 'like'])->name('like');
    Route::delete('/photo/{photo}/unlike', [LikeController::class, 'unlike'])->name('unlike');
    Route::get('/photos/{photo}/edit', [AppController::class, 'edit'])->name('app.edit');
    Route::put('/photos/{photo}', [AppController::class, 'update'])->name('app.update');
    Route::get('/photo/{id}', [AppController::class, 'show'])->name('app.show');
    Route::get('album', [AlbumController::class, 'index'])->name('album.index');
});

Route::middleware('auth')->group(function () {
    Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::delete('photo/{photo}', [PhotouserController::class, 'destroy'])->name('photouser.destroy');
    Route::get('/photos/{daerah_id}', [AppController::class, 'photosByDaerah'])->name('photos.by.daerah');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'must-admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
