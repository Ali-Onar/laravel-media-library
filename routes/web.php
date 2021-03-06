<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/albums', AlbumController::class)->middleware('auth');
Route::post('albums/{album}/upload', [AlbumController::class, 'upload'])->name('albums.upload')->middleware('auth');
Route::get('albums/{album}/image/{image}', [AlbumController::class, 'showImage'])->name('album.image.show');
Route::delete('albums/{album}/image/{image}', [AlbumController::class, 'destroyImage'])->name('album.image.destroy');