<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", "PostsController@getLatestPost");

Route::get('/test', function () {
    $message = request('message');
    return view('test', [
        'message' => $message
    ]);
});
Route::get('/posts', 'PostsController@showAll');
Route::get('/posts/create', 'PostsController@returnCreatePage');
Route::post('/posts/create', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show')->name('post.showPost');//name for this specific route;;
Route::put('/posts/{post}/edit', 'PostsController@update');
Route::get('/posts/{post}/edit', 'PostsController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
