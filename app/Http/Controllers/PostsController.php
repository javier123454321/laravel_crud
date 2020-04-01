<?php

namespace App\Http\Controllers;
use Response;

class PostsController extends Controller{
    
    public function show($slug){
    $post = \DB::table('posts_table')->where('slug', $slug)->first();
    return view('posts', [
        'post' => $post
    ]);
    }
}