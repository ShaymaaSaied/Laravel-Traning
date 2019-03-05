<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\RegistrationForm;
class PostsController extends Controller
{
    //
    public function index(){

        $posts=Post::all();

        return view('posts.index',compact('posts'));
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
        session()->flash('message','post created');

        return redirect('/posts');
    }



    public function create(){

        return view('posts.create');
    }
}
