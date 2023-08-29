<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Models\Post;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//	Laravelの教科書デフォの投稿
Route::get('post/create',[PostController::class,'create'])->name('post.create');
Route::post('post/store',[PostController::class,'store'])->name('post.store');
Route::get('post/index',[PostController::class,'index'])->name('post.index');

//	Youtubeから動画引っ張ってくる
Route::get('videogallery',function(){
	return view('utility.youtube');
})->name('videogallery');

//	郵便番号で住所検索
Route::get('zipcode',function(){
	return view('utility.zipcode');
})->name('zipcode');

//	リッチテキストエディタの実装
Route::post('article/store',[ArticleController::class,'store'])->name('article.store');
Route::get('article/create',[ArticleController::class,'create'])->name('article.create');


require __DIR__.'/auth.php';
