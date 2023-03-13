<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

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
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about_us', [PagesController::class, 'index'])->name('about_us');
Route::get('/manufacturing', [PagesController::class, 'index'])->name('manufacturing');
Route::get('/facility', [PagesController::class, 'index'])->name('facility');
Route::get('/services', [PagesController::class, 'index'])->name('services');
// Contacts
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('contacts', [ContactController::class, 'index'])->name('contactsSend');

Route::group([
    'as' => 'blog.',
    'prefix' => 'blog'
], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/{post}', 'BlogsController@show')->name('post');
    Route::post('blog/{post}/comment', 'CommentController@store')->middleware('auth');
    Route::patch('blog/{post}/comment/{id}', 'CommentController@update')->middleware('auth');
});



// Products
Route::group([
    'as' => 'products.',
    'prefix' => 'products'
], function () {
    Route::get('products', 'ProductsController@index')->name('products-list');
    Route::get('products/{id}', 'ProductsController@show')->name('product');
});

// Photos
Route::group([
    'as' => 'photos.',
    'prefix' => 'photos'
], function () {
    Route::get('photos', 'PhotosController@index')->name('photos');
    Route::get('photos/{id}', 'PhotosController@show')->name('photo');
});

require __DIR__.'/auth.php';
