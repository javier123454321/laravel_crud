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

    public function showAll(){

        $all_posts = Post::all(['name', 'id', 'created_on', 'slug']);
        return view('all_posts', ['posts' => $all_posts]);
    }

    public function fetchAll(){
        $all_posts = Post::all('name');
        echo(json_encode($all_posts));
        return response()->json(["Hello"=>"world"]);
    }
}