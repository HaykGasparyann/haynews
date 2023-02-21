<?php

use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCommentsController;

Route::get('/', [\App\Http\Controllers\NewsController::class,'index'])->name('welcome');
Route::get('/newses/{news:slug}',[NewsController::class,'show']);
Route::post('newses/{news:slug}/comments',[NewsCommentsController::class,'store']);


Route::get('/contact', function () {
    return view('contact',[
        'categories' => Category::all()
    ]);
});



Route::get('/categories/{category:slug}', function (Category $category) {

    return view('category', [
        'newses'=> $category->newses,
          'currentCategory' => $category,
          'categories' => Category::all()
]);
});

Route::get('/authors/{author:username}', function (User $author) {

    return view('author', [
        'newses'=> $author->newses,
          'categories' => Category::all()
    ]);
});
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/news/create', [AdminNewsController::class ,'create'])->middleware('writer');
Route::post('admin/newses', [AdminNewsController::class, 'store'])->middleware('writer');

Route::delete('admin/news/{news}', [AdminNewsController::class, 'destroy'])->middleware('writer');
Route::delete('admin/news/users/{user}', [AdminNewsController::class, 'destroy_user'])->middleware('admin');


Route::get('admin/news/index', [AdminNewsController::class ,'index'])->middleware('writer');

Route::get('admin/news/users', [AdminNewsController::class, 'users'])->middleware('admin');

Route::get('admin/news/{user}/edit-user', [AdminNewsController::class, 'edit_user'])->middleware('admin');
Route::patch('admin/news/{user}/edit-user', [AdminNewsController::class, 'update_user'])->middleware('admin');

Route::get('admin/news/{news}/edit', [AdminNewsController::class, 'edit'])->middleware('writer');
Route::patch('admin/news/{news}/edit', [AdminNewsController::class, 'update'])->middleware('writer');
