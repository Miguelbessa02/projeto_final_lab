<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\StripeController;
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

Route::get('/ajuda', function () {
    return view('pages.ajuda');
})->middleware(['auth', 'verified'])->name('ajuda');

Route::get('/about', function () {
    return view('pages.about');
})->middleware(['auth', 'verified'])->name('about');


// Rotas feed anuncios:
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ExperienceController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [ExperienceController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [ExperienceController::class, 'store'])->name('dashboard');
});

// Rotas comentarios anuncios:
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/experiences/{experience_id}/comments', [CommentController::class, 'showComments'])->name('experience.comments');
    Route::get('/experiences/{experience_id}/comment/create', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/experiences/{experience_id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Rotas para likes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/like', [LikeController::class, 'store'])->name('like.store');
});

//Rotas perfil:
Route::middleware('auth')->group(function () {
    Route::get('/profile/experiences', [ProfileController::class, 'get'])->name('profile.experiences');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rotas stripe:
Route::middleware('auth')->group(function () {
    Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
});

require __DIR__.'/auth.php';
