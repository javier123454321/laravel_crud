<?php

namespace App\Http\Controllers;
use App\Post;

class PostsController extends Controller{
    
    public function show($slug){
    // $post = \DB::table('posts_table')->where('slug', $slug)->first();

    return view('posts', [
        'post' => Post::where('slug', $slug)->firstOrFail()
    ]);
    }
}