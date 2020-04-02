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

        $all_posts = Post::all(['name', 'id', 'created_at', 'slug']);
        return view('all_posts', ['posts' => $all_posts]);
    }

    public function fetchAll(){
        $all_posts = Post::all('name');
        echo(json_encode($all_posts));
        return response()->json(["Hello"=>"world"]);
    }
    
    public function getLatestPost(){
        $latest_post = Post::orderBy('id', 'DESC')->take(2)->get();
        $response = response()->json($latest_post, 200, []);
        echo $response;
        return $response;
    }
}