<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUserscontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('admin/posts/delete/{post}', [AdminPostsController::class, 'destroy'])->name('admin.posts.delete');

Route::middleware('auth')->group(function(){
    
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // posts
    Route::get('/admin/posts', [AdminPostsController::class, 'index'])->name('admin.posts');

    Route::get('/admin/posts/create', [AdminPostsController::class, 'createPosts'])->name('admin.posts.create');

    Route::post('/admin/posts/create', [AdminPostsController::class, 'storePosts'])->name('admin.posts.store');

    Route::get('/admin/posts/edit/{id}', [AdminPostsController::class, 'editPosts'])->name('admin.posts.edit');

    Route::patch('/admin/posts/update/{post}', [AdminPostsController::class, 'updatePosts'])->name('admin.posts.update');

    // users
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');
});