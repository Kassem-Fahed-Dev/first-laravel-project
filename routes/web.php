<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedConroller;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\UserController;
use App\Models\idea;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('user', UserController::class)->only(['edit','show','update'])->middleware('auth');

Route::resource('user', UserController::class)->only(['show']);

Route::get('user', [UserController::class,"profile"])->middleware('auth')->name("profile");

Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name("users.follow");

Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name("users.unfollow");

Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name("ideas.like");

Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name("ideas.unlike");

Route::get('/feed', [FeedConroller::class,'__invoke'])->middleware('auth')->name('feed');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','can:admin']);

Route::get('/terms',function ()  {
     return view('terms');
})->name('terms');

