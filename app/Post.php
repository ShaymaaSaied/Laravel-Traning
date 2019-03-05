<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title','body','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){

        $this->comments()->create([
            'body'=>$body
        ]);
        /*Comment::create([
            'body'=>$body,
            'post_id'=>$this->id
        ]);*/
    }

    public static function archives(){
        $archives=Post::selectRaw('year(created_at) year, monthname(created_at) month')
            ->groupBy('year','month')
            ->get()
            ->toArray();
        return $archives;
    }
}
