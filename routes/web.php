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
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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
})->middleware(['auth', 'verified'])->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about_us', [PageController::class, 'index'])->name('about_us');
Route::get('/manufacturing', [PageController::class, 'index'])->name('manufacturing');
Route::get('/facility', [PageController::class, 'index'])->name('facility');
Route::get('/quality', [PageController::class, 'index'])->name('quality');
Route::get('/certificates', [PageController::class, 'index'])->name('certificates');
Route::get('/services', [PageController::class, 'index'])->name('services');

// Contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactController::class, 'send'])->name('contactsSend');
Route::post('/search', [SearchController::class, 'index'])->name('search');

Route::prefix('faq')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('faq');
    Route::post('/store', [FaqController::class, 'store'])->name('faqsend');
    Route::get('/{id}/edit', [FaqController::class, 'edit'])->name('faqedit');
    Route::post('/{id}/update', [FaqController::class, 'update'])->name('faqupdate');
    Route::post('/{id}/delete', [FaqController::class, 'delete'])->name('faqdelete');
});

Route::prefix('settings')->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('settings');
    Route::post('/store', [SettingsController::class, 'store'])->name('settingsstore');
    Route::get('/{id}/edit', [SettingsController::class, 'edit'])->name('settingsedit');
    Route::post('/update', [SettingsController::class, 'update'])->name('settingsupdate');
    Route::get('/user/create', [UserController::class, 'create'])->name('usercreate');
    Route::post('/user', [UserController::class, 'store'])->name('userstore');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('useredit');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('userupdate');
    Route::post('/user/{id}/delete', [UserController::class, 'delete'])->name('userdelete');
    Route::post('/contact/{id}/delete', [ContactController::class, 'delete'])->name('contactdelete');
});





Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/add', [BlogController::class, 'create'])->name('postcreate');
    Route::get('/{id}', [BlogController::class, 'show'])->name('postshow');
    Route::post('/store', [BlogController::class, 'store'])->name('poststore');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('postedit');
    Route::post('/{id}/update', [BlogController::class, 'update'])->name('postupdate');
    Route::post('/{id}/delete', [BlogController::class, 'delete'])->name('postdelete');
});



require __DIR__.'/auth.php';
