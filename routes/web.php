<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\GallaryController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\TypeController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Dashboard\VoiceController;
use App\Http\Controllers\Dashboard\WordController;
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

Route::get('/', function () {
    return view('welcome');
});

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
Route::get('dashboar/words', [WordController::class, 'index'])->name('words.index');

Route::view('/comment', 'front.comment');
Route::view('/services', 'front.services');

require __DIR__.'/auth.php';
