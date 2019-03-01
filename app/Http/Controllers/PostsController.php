<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    //
    public function index(){

        $posts=Post::latest()->get();

        return view('posts.index',compact('posts'));
    }
    public function show($id){

        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }
    public function store(){

        Post::create(request()->all());

        return redirect('/posts');
    }



    public function create(){

        return view('posts.create');
    }
}
