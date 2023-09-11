<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\CommentController as DashboardCommentController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\GallaryController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\ServiceCommentController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\ServiceGalleryController;
use App\Http\Controllers\Dashboard\ServiceImageController;
use App\Http\Controllers\Dashboard\TypeController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Dashboard\VoiceController;
use App\Http\Controllers\Dashboard\WordController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\FeedbackController as FrontFeedbackController;
use App\Http\Controllers\Front\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/languages/{loc}', function ($loc) {
    if (in_array($loc, ['en', 'ru', 'uz'])) {
        session()->put('locale', $loc);
    }
    return redirect()->back();
});

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/comment', [CommentController::class, 'index']);
Route::get('/gallery', [CommentController::class, 'gallery']);
Route::get('/service/{id},', [WelcomeController::class, 'show'])->name('front.service.show');
Route::get('/result', [WelcomeController::class, 'result']);
Route::get('/feedback', [FrontFeedbackController::class, 'store'])->name('front.feedback.store');
Route::get('/clientcomment', [CommentController::class, 'comment']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('dashboard/service', ServiceController::class);
Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/video', VideoController::class);
Route::resource('dashboard/voice', VoiceController::class);
Route::resource('dashboard/image', ImageController::class);
Route::resource('dashboard/gallary', GallaryController::class);
Route::resource('dashboard/feedback', FeedbackController::class);
Route::resource('dashboard/type', TypeController::class);
Route::resource('dashboard/serviceimage', ServiceImageController::class);
Route::resource('dashboard/servicecomment', ServiceCommentController::class);
Route::resource('dashboard/servicegallery', ServiceGalleryController::class);
Route::resource('dashboard/comment', DashboardCommentController::class);
Route::resource('dashboard/clientcomment', ClientController::class);
Route::get('dashboar/words', [WordController::class, 'index'])->name('words.index');

// Route::view('/comment', 'front.comment');
// Route::view('/services', 'front.services');

require __DIR__.'/auth.php';
