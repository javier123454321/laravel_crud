<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $message = request('message');
    return view('test', [
        'message' => $message
    ]);
});

Route::get('/posts/{post}', function($post){
    $posts = [
        'first-post' => 'Hello, this is my first post',
        'second-post' => 'this is my second'
    ];
    if(!array_key_exists($post, $posts)){
        abort(404, 'No post with that title found');
    };

    return view('posts', [
        'post' => $posts[$post]
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
