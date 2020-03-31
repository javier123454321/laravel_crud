<?php

namespace App\Http\Controllers;

class PostsController{
    
    public function show($post){
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
    }
}