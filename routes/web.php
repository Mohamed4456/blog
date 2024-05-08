<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('my.profile');
Route::PUT('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


/**  routes for Post controller */

Route::resource('post', PostController::class);

Route::get('/post/soft/delete/{id}', [PostController::class, 'softDelete'])->name('post.softDelete');
Route::get('/trashed/posts', [PostController::class, 'trash'])->name('post.trash');
Route::get('/post/hdelete/{id}', [PostController::class, 'hdelete'])->name('post.hdelete');
Route::get('/post/restore/{id}', [PostController::class, 'restore'])->name('post.restore');


/**  routes for tag controller */
Route::resource('tag', TagController::class);

Route::get('/tag/hdelete/{id}', [TagController::class, 'hdelete'])->name('tag.hdelete');



/**  routes for User controller */
Route::resource('user', UserController::class);
Route::get('/user/hdelete/{id}', [UserController::class, 'hdelete'])->name('user.hdelete');




