<?php

namespace App\Http\Controllers;
use App\Post;
use DB;

class PostsController extends Controller{
    
    public function show($slug){
    // $post = \DB::table('posts_table')->where('slug', $slug)->first();
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts', [
            'post' => $post,
            'tags' => $post->tags->pluck('tagname')
        ]);
    }

    public function showAll(){
        $all_posts = Post::orderBy('id', 'DESC')->get(['name', 'id', 'created_at', 'slug']);
        if(request('tag')){
            // $filtered_posts = Tag::where('tagname', request('tag'))->get()->pluck('post_id');
            // SELECT posts.id FROM posts
            // JOIN post_tag AS p_id ON p_id.post_id = posts.id
            // JOIN tags ON p_id.tag_id  = tags.id
            // WHERE tags.tagname = 'alias'
            $filtered_posts = DB::table('posts')
                                ->join('post_tag', 'post_tag.post_id', '=', 'posts.id')
                                ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
                                ->where('tags.tagname', '=', request('tag'))
                                ->get(['posts.name', 'posts.id', 'posts.created_at', 'posts.slug']);
            return view('all_posts', ['posts' => $filtered_posts]);
        }
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

        $this->validateInputs();
        $id = "post".(Post::orderBy('id', 'DESC')->take(1)->get('id')[0]["id"]+1);
        $inputs['slug'] = $id;
        
        Post::create($inputs);

        return redirect('/posts/'.$id);
    }

    public function edit($post){
        $post_info = Post::where('slug', $post)->get();

        return view('edit', ['article' => $post_info]);
    }

    public function update($post){
        $post_info = Post::where('slug', $post)->firstOrFail(); 
        $inputs = $this->validateInputs();
        $inputs['slug'] = $post_info->slug;
        $post_info->update($inputs);
        
        return redirect(route('post.showPost', $post_info->slug));
    }

    private function validateInputs(){
        $validatedInputs = request()->validate([
            'name' => 'required',
            'body' => 'required'
        ]);
        return $validatedInputs;
    }
}