<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
// });// 

Auth::routes();
    
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/post/{id}', [HomeController::class, 'post'])->name('home.post');

Route::middleware('auth')->group(function(){

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // posts
    Route::get('/admin/posts', [AdminPostsController::class, 'index'])->name('admin.posts');

    Route::get('/admin/posts/create', [AdminPostsController::class, 'createPosts'])->name('admin.posts.create');

    Route::post('/admin/posts/create', [AdminPostsController::class, 'storePosts'])->name('admin.posts.store');

    Route::get('/admin/posts/edit/{post}', [AdminPostsController::class, 'editPosts'])->middleware('can:view,post')->name('admin.posts.edit');

    Route::patch('/admin/posts/update/{post}', [AdminPostsController::class, 'updatePosts'])->name('admin.posts.update');

    Route::delete('admin/posts/delete/{post}', [AdminPostsController::class, 'deletePosts'])->middleware('can:delete,post')->name('admin.posts.delete');

    // users
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');

    Route::get('/admin/user/edit/{id}', [AdminUsersController::class, 'editUser'])->name('admin.user.edit');

    Route::patch('/admin/user/edit/{id}', [AdminUsersController::class, 'updateUser'])->name('admin.user.update');

    Route::delete('/admin/user/delete/{user}', [AdminUsersController::class, 'deleteUser'])->name('admin.user.delete');
});