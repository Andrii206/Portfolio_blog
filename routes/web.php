<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('main.index');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () { 
        Route::get('/', 'IndexController')->name('post.index');
        Route::get('/tag/{tag}', 'TagController')->name('post.tag');
        Route::get('/category/{category}', 'CategoryController')->name('post.category');
        Route::get('/{post}', 'ShowController')->name('post.show');
        Route::get('/popular-posts', 'PopularPostsController')->name('post.popular-posts');
        Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function(){
            Route::post('/', 'StoreController')->name('post.comment.store');
        });
        Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function(){
            Route::post('/', 'StoreController')->name('post.like.store');
        });
    });
    Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('personal.main.index');
        });
        Route::group(['namespace' => 'Liked', 'prefix'=> 'liked'], function () {
            Route::get('/', 'IndexController')->name('personal.liked.index');
            Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
        });   
        Route::group(['namespace' => 'Comment', 'prefix'=> 'comment'], function () {
            Route::get('/', 'IndexController')->name('personal.comment.index');
            Route::delete('/{delete}', 'DeleteController')->name('personal.comment.delete');
            Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
            Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        });       
    });                                                                           
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('admin.main.index');
        });
    
      
        Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            Route::get('/', 'IndexController')->name('admin.category.index');
            Route::get('/create', 'CreateController')->name('admin.category.create');
            Route::post('/', 'StoreController')->name('admin.category.store');
            Route::get('/{category}', 'ShowController')->name('admin.category.show');
            Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
            Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
            Route::delete('/{category}/delete', 'DeleteController')->name('admin.category.delete');
        });
        Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            Route::get('/', 'IndexController')->name('admin.tag.index');
            Route::get('/create', 'CreateController')->name('admin.tag.create');
            Route::post('/', 'StoreController')->name('admin.tag.store');
            Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
            Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
            Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
            Route::delete('/{tag}/delete', 'DeleteController')->name('admin.tag.delete');
        });
        Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            Route::get('/', 'IndexController')->name('admin.post.index');
            Route::get('/create', 'CreateController')->name('admin.post.create');
            Route::post('/', 'StoreController')->name('admin.post.store');
            Route::get('/{post}', 'ShowController')->name('admin.post.show');
            Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
            Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
            Route::delete('/{post}/delete', 'DeleteController')->name('admin.post.delete');
        });
        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', 'IndexController')->name('admin.user.index');
            Route::get('/create', 'CreateController')->name('admin.user.create');
            Route::post('/', 'StoreController')->name('admin.user.store');
            Route::get('/{user}', 'ShowController')->name('admin.user.show');
            Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
            Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
            Route::delete('/{user}/delete', 'DeleteController')->name('admin.user.delete');
        });
    });
    Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes(['verify' => true]);
