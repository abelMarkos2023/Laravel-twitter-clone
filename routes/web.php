<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\TweetController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/tweet',[TweetController::class,'store'])->name('tweets.store');
    Route::get('/profile/{user}',[TweetController::class,'show'])->name('profile.view');
    Route::post('follow/{user}',[TweetController::class,'update'])->name('user.follow');
    Route::get('/profile/{user}/edit',[ProfilePageController::class,'edit'])->name('profile.show');
    Route::post('/profile/{user}',[ProfilePageController::class,'update'])->name('profilePage.update');
    Route::get('/explore',[ProfilePageController::class,'create'])->name('profile.search');
    Route::post('/explore',[ProfilePageController::class,'store'])->name('profile.find');
    Route::post('/tweets/like/{tweet}',[LikeController::class,'like'])->name('tweet.like');
    Route::post('/tweets/dislike/{tweet}',[LikeController::class,'dislike'])->name('tweet.dislike');
    Route::delete('tweet/{tweet}',[TweetController::class,'destroy'])->name('tweet.destroy');


});



require __DIR__.'/auth.php';
