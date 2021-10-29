<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostAPIController extends Controller
{
    public function index(){
        
            return Post::all();
    }

    public function store(){
        Request()->validate([
            'title' => 'required',
            'content' => 'required',
          ]);
         
         
         return Post::create([
             'title'=> Request('title'),
             'content'=>Request('content'),
         ]);
    }

    public function update(Post $post){
        Request()->validate([
            'title' => 'required',
            'content' => 'required',
         ]);
        
         
        $success =$post->update([
            'title' => Request('title'),
            'content'=> Request('content'),
        ]);
    
        return [
            "Success"=> $success
        ];
    }
    public function destroy (Post $post){
        $success= $post->delete();

        return [
         "Success"=> $success
         ];
    }
}
