<?php

use App\Http\Controllers\Blog\BlogListController;
use App\Http\Controllers\Blog\PostCreateController;
use App\Http\Controllers\Blog\PostDeleteActionController;
use App\Http\Controllers\Blog\PostEditController;
use App\Http\Controllers\Blog\PostStoreActionController;
use App\Http\Controllers\Blog\PostShowController;
use App\Http\Controllers\Blog\PostUpdateActionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SearchController;

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
Route::get('/about_us', [PageController::class, 'index'])->name('about_us');
Route::get('/manufacturing', [PageController::class, 'index'])->name('manufacturing');
Route::get('/facility', [PageController::class, 'index'])->name('facility');
Route::get('/certification', [PageController::class, 'index'])->name('certification');
Route::get('/services', [PageController::class, 'index'])->name('services');
// Contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'index'])->name('contactsSend');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::post('/faq', [FaqController::class, 'index'])->name('faqSend');
Route::post('/search', [SearchController::class, 'index'])->name('search');

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/add', [BlogController::class, 'create'])->name('postcreate');
    Route::get('/{id}', [BlogController::class, 'show'])->name('postshow');
    Route::post('/store', [BlogController::class, 'store'])->name('poststore');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('postedit');
    Route::post('/{id}/update', [BlogController::class, 'update'])->name('postupdate');
    Route::post('/{id}/delete', [BlogController::class, 'delete'])->name('postdelete');
});


//Route::group([
//    'as' => 'blog.',
//    'prefix' => 'blog'
//], function () {
//    Route::get('/', 'BlogController@index')->name('blog');
//    Route::get('/add', 'BlogController@create')->name('postcreate');
//    Route::get('/{id}', 'BlogController@show')->name('postshow');
//    Route::post('/store', 'BlogController@store')->name('poststore');
//    Route::get('/{id}/edit', 'BlogController@edit')->name('postedit');
//    Route::post('/{id}/update', 'BlogController@update')->name('postupdate');
//    Route::post('/{id}/delete', 'BlogController@delete')->name('postdelete');
//});





//Route::resource('blog', BlogController::class);

require __DIR__.'/auth.php';
