<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    //
    public function index(){

        $posts=Post::all();
        $archives=Post::selectRaw('year(created_at) year',['monthname(created_at) month','count(*) published'])
            ->groupBy('year','month')
            ->get()
            ->toArray();
        return view('posts.index',compact('posts','archives'));
    }
    public function show($id){

        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }
    public function store(){
        $this->validate(request(),[
            'title' =>'required',
            'body'  =>'required'
        ]);
        Post::create([
            'title'=>request('title'),
            'body'=>request('body'),
            'user_id'=>auth()->id()
        ]);

        return redirect('/posts');
    }



    public function create(){

        return view('posts.create');
    }
}
