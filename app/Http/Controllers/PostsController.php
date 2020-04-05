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

    $all_posts = Post::orderBy('id', 'DESC')->get(['name', 'id', 'created_at', 'slug']);
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
        return view('welcome', ['latest' => $latest_post]);;
    }

    public function returnCreatePage(){
        return view('create');
    }

    public function store(){
        $post = new Post();
        $post->name=request('name');
        $post->body=request('body');

        $id = Post::orderBy('id', 'DESC')->take(1)->get('id')[0]["id"];
        $id = "post".($id+1);
        $post->slug=($id);
        $post->save();
        return redirect('/posts/'.$id);
    }

    public function edit(){
        return view('edit');
    }
}